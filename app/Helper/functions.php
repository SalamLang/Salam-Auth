<?php

use App\Class\Route;
use App\Class\Vite;
use App\Models\User;
use eftec\bladeone\BladeOne;

function view($view, $data = [], $return = false): string
{
    try {
        $views = __DIR__.DS.DSUP.DSUP.'resources'.DS.'views'.DS;
        $cache = __DIR__.DS.DSUP.DSUP.'cache';

        $blade = new BladeOne($views, $cache, BladeOne::MODE_AUTO);

        if ($return) {
            return $blade->run($view, $data);
        } else {
            echo $blade->run($view, $data);

            return '';
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function abort($error = '404'): void
{
    switch ($error) {
        case '400':
            view('errors.400');
            break;
        case '401':
            view('errors.401');
            break;
        case '402':
            view('errors.402');
            break;
        case '403':
            view('errors.403');
            break;
        case '404':
            view('errors.404');
            break;
        case '500':
            view('errors.500');
            break;
        default:
            echo $error;
            break;
    }
}

function env($key): ?string
{
    $file = fopen(__DIR__.DS.DSUP.DSUP.'.env', 'r');
    if ($file) {
        while (($line = fgets($file)) !== false) {
            $line = trim($line);
            if (empty($line) || $line[0] == '#') {
                continue;
            }
            [$k, $v] = explode('=', $line, 2);
            $k = trim($k);
            $v = trim($v);
            if ($k == $key) {
                fclose($file);

                return $v;
            }
        }
        fclose($file);
    }

    return null;
}

function css($address): string
{
    return Vite::css($address);
}

function js($address): string
{
    return Vite::js($address);
}

function dd($data, $die = true): void
{
    function formatData($data, $level = 0): string
    {
        $html = '';
        if (is_array($data) || is_object($data)) {
            $html .= '<div dir="ltr">';
            $html .= "<span class='dd-toggle' style='color: #FF8400; cursor: pointer;' onclick='toggleContent(this)'>[+]</span> ";
            $html .= "<span style='color: #B0BEC5;'>";
            $html .= (is_array($data) ? 'Array' : 'Object').' ('.count((array) $data).')';
            $html .= '</span>';
            $html .= "<div class='dd-content' style='display: none;'>";
            foreach ($data as $key => $value) {
                $html .= "<div><span style='color: #FF8400;'>{$key}</span> => ".formatData($value, $level + 1).'</div>';
            }
            $html .= '</div></div>';
        } elseif (is_bool($data)) {
            $html .= "<span style='color: #4CAF50;'>".($data ? 'true' : 'false').'</span>';
        } elseif (is_null($data)) {
            $html .= "<span style='color: #D32F2F;'>null</span>";
        } else {
            $html .= "<span style='color: #00c3e6;'>".htmlspecialchars((string) $data, ENT_QUOTES, 'UTF-8').'</span>';
        }

        return $html;
    }

    $formattedData = formatData($data);

    $template = "
        <style>
            .dd-container {
                padding: 15px 10px;
                background-color: #18171b;
                color: #b1b1b1;
                font-family: 'Consolas', 'Monaco', monospace;
                font-size: 14px;
                border-radius: 10px;
                margin-bottom: 20px;
                box-shadow: 0 3px 15px -5px black;
                word-wrap: break-word;
            }
            .dd-toggle {
                cursor: pointer;
                color: #FF8400;
                margin-right: 5px;
            }
            .dd-content {
                margin-left: 25px;
            }
            .dd-content>div {
                display: flex;
                gap: 3px;
                margin-top: 2px;
            }
            
        </style>
        <div class='dd-container'>
            {$formattedData}
        </div>
        <script>
            function toggleContent(element) {
                const content = element.parentElement.querySelector('.dd-content');
                if (content.style.display === 'none') {
                    content.style.display = 'block';
                    element.textContent = '[-]';
                } else {
                    content.style.display = 'none';
                    element.textContent = '[+]';
                }
            }
        </script>
    ";

    echo $template;

    if ($die) {
        exit();
    }
}

function asset($path): string
{
    $baseUrl = env('APP_URL');
    if (! str_starts_with($path, '/')) {
        $path = '/'.$path;
    }

    return $baseUrl.$path;
}

function in_route(): string
{
    if (str_ends_with(env('APP_URL').Flight::request()->url, '/')) {
        return substr(env('APP_URL').Flight::request()->url, 0, strlen(env('APP_URL').Flight::request()->url) - 1);
    } else {
        return env('APP_URL').Flight::request()->url;
    }
}

function route($key): string
{
    return Route::get($key);
}

function user(): mixed
{
    $token = $_COOKIE['token'];
    $db = Flight::db();
    $stmt = $db->prepare('SELECT * FROM tokens WHERE `token` = :token');
    $stmt->execute([':token' => $token]);
    $token_result = $stmt->fetchAll();
    $token_result = end($token_result)['user_id'];

    return User::find(intval($token_result));
}

function api_user(): mixed
{
    $token = getallheaders()["Authorization"];
    $db = Flight::db();
    $stmt = $db->prepare('SELECT * FROM tokens WHERE `token` = :token');
    $stmt->execute([':token' => $token]);
    $token_result = $stmt->fetchAll();
    $token_result = end($token_result)['user_id'];

    return User::find(intval($token_result));
}

/**
 * @throws \Random\RandomException
 */
function uuid(): string
{
    $b = random_bytes(16);
    $b[6] = chr(ord($b[6]) & 0x0F | 0x40);
    $b[8] = chr(ord($b[8]) & 0x3F | 0x80);

    return vsprintf('%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex($b), 4));
}

function chunck_data($table): array
{
    $chunkSize = 50;
    $lastId = 0;
    $allData = [];
    $conn = Flight::db();

    while (true) {
        $stmt = $conn->prepare("SELECT * FROM $table WHERE id > :lastId ORDER BY id ASC LIMIT :chunkSize");
        $stmt->bindValue(':lastId', $lastId, PDO::PARAM_INT);
        $stmt->bindValue(':chunkSize', $chunkSize, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($result) == 0) {
            break;
        }

        foreach ($result as $row) {
            $allData[] = $row;
            $lastId = $row['id'];
        }
    }

    return $allData;
}

function slugify($str, $options = array()): string
{

    // Make sure string is in UTF-8 and strip invalid UTF-8 characters
    $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());

    $defaults = array(
        'delimiter'     => '-',
        'limit'         => null,
        'lowercase'     => true,
        'replacements'  => array(),
        'transliterate' => false,
    );

    // Merge options
    $options = array_merge($defaults, $options);

    $char_map = array(
        // Latin
        'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
        'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
        'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
        'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
        'ß' => 'ss',
        'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
        'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
        'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
        'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
        'ÿ' => 'y',
        // Latin symbols
        '©' => '(c)',
        // Greek
        'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
        'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
        'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
        'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
        'Ϋ' => 'Y',
        'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
        'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
        'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
        'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
        'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
        // Turkish
        'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
        'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
        // Russian
        'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
        'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
        'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
        'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
        'Я' => 'Ya',
        'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
        'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
        'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
        'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
        'я' => 'ya',
        // Ukrainian
        'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
        'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
        // Czech
        'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
        'Ž' => 'Z',
        'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
        'ž' => 'z',
        // Polish
        'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
        'Ż' => 'Z',
        'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
        'ż' => 'z',
        // Latvian
        'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
        'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
        'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
        'š' => 's', 'ū' => 'u', 'ž' => 'z'
    );

    // Make custom replacements
    $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);

    // Transliterate characters to ASCII
    if ($options['transliterate']) {
        $str = str_replace(array_keys($char_map), $char_map, $str);
    }

    // Replace non-alphanumeric characters with our delimiter
    $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);

    // Remove duplicate delimiters
    $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);

    // Truncate slug to max. characters
    $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');

    // Remove delimiter from ends
    $str = trim($str, $options['delimiter']);

    return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}

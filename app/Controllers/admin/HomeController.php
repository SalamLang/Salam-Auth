<?php

namespace App\Controllers\admin;

use App\Controllers\Controller;
use Flight;

class HomeController extends Controller
{
    public function index(): void
    {
        function folderSize($dir): int
        {
            $size = 0;
            foreach (scandir($dir) as $file) {
                if ($file != '.' && $file != '..') {
                    if (is_dir($dir.'/'.$file)) {
                        $size += folderSize($dir.'/'.$file);
                    } else {
                        $size += filesize($dir.'/'.$file);
                    }
                }
            }

            return $size;
        }

        $directory = __DIR__.DIRECTORY_SEPARATOR.DSUP.DSUP.DSUP;
        $this_project = folderSize($directory);
        $this_project = round($this_project / (1024 * 1024));
        $total_space = disk_total_space($directory);
        $total_space = $total_space / (1024 * 1024 * 1024);
        $free_space = disk_free_space($directory);
        $free_space = $free_space / (1024 * 1024 * 1024);

        $db = Flight::db();
        $query1 = 'SELECT DATE(created_at) AS date, COUNT(*) AS count FROM codes WHERE created_at >= CURDATE() - INTERVAL 10 DAY GROUP BY DATE(created_at) ORDER BY DATE(created_at)';
        $stmt1 = $db->prepare($query1);
        $stmt1->execute();
        $codes_history = $stmt1->fetchAll();
        $codes_count = 0;
        foreach ($codes_history as $history) {
            $codes_count += intval($history['count']);
        }

        $query2 = 'SELECT DATE(created_at) AS date, COUNT(*) AS count FROM tokens WHERE created_at >= CURDATE() - INTERVAL 10 DAY GROUP BY DATE(created_at) ORDER BY DATE(created_at)';
        $stmt2 = $db->prepare($query2);
        $stmt2->execute();
        $tokens_history = $stmt2->fetchAll();
        $tokens_count = 0;
        foreach ($tokens_history as $history) {
            $tokens_count += intval($history['count']);
        }

        $query3 = 'SELECT DATE(created_at) AS date, COUNT(*) AS count FROM users WHERE created_at >= CURDATE() - INTERVAL 10 DAY GROUP BY DATE(created_at) ORDER BY DATE(created_at)';
        $stmt3 = $db->prepare($query3);
        $stmt3->execute();
        $users_history = $stmt3->fetchAll();
        $users_count = 0;
        foreach ($users_history as $history) {
            $users_count += intval($history['count']);
        }

        $query4 = 'SELECT DATE(created_at) AS date, COUNT(*) AS count FROM codes_visits WHERE created_at >= CURDATE() - INTERVAL 10 DAY GROUP BY DATE(created_at) ORDER BY DATE(created_at)';
        $stmt4 = $db->prepare($query4);
        $stmt4->execute();
        $codes_visits_history = $stmt4->fetchAll();
        $codes_visits_count = 0;
        foreach ($codes_visits_history as $history) {
            $codes_visits_count += intval($history['count']);
        }

        $query5 = 'SELECT * FROM codes_visits ORDER BY id DESC LIMIT 10';
        $stmt5 = $db->prepare($query5);
        $stmt5->execute();
        $last_codes = $stmt5->fetchAll();

        view('admin.home', [
            'codes_history' => $codes_history,
            'codes_count' => $codes_count,
            'tokens_history' => $tokens_history,
            'tokens_count' => $tokens_count,
            'users_history' => $users_history,
            'users_count' => $users_count,
            'codes_visits_history' => $codes_visits_history,
            'codes_visits_count' => $codes_visits_count,
            'total_space' => $total_space,
            'free_space' => $free_space,
            'this_project' => $this_project,
            'last_codes' => $last_codes,
        ]);
    }
}

const {EditorView, basicSetup} = CM["codemirror"];
const {completeFromList} = CM["@codemirror/autocomplete"];
const {LRParser} = CM["@lezer/lr"];
const {LRLanguage} = CM["@codemirror/language"];
const {LanguageSupport} = CM["@codemirror/language"];
const {foldNodeProp, foldInside, indentNodeProp} = CM["@codemirror/language"];
const {styleTags, tags} = CM["@lezer/highlight"];

const parser = LRParser.deserialize({
    version: 14,
    states: "#SQYQPOOO#wQQO'#C_OOQO'#Ce'#CeQYQPOOOOQO'#Ca'#CaO$OQQO'#CfO%`QQO'#C`O%gQPO,58yOOQO-E6c-E6cO%lQPO'#CgO%tQQO,59QOOQO-E6d-E6dOOQO1G.e1G.eOOQO'#Cb'#CbOOQO,59R,59ROOQO-E6e-E6e",
    stateData: "'U~O^OSPOS~O_POtPOuPOvPOwPOxPOyPOzPO{PO|PO}PO!OPO!PPO!QPO!RPO!SPO!TPO!UPO!VPO!WPO!XPO~O`SOaSObSOcSOdSOeSOfSOgSOhSOiSOjSOkSOlSOmSOnSOoSOpSOqSO~OsSP~P!mOrXO`YXaYXbYXcYXdYXeYXfYXgYXhYXiYXjYXkYXlYXmYXnYXoYXpYXqYXsYX~OsSX~P!mOs[O~OV]OW]O~OrXO`YaaYabYacYadYaeYafYagYahYaiYajYakYalYamYanYaoYapYaqYasYa~O",
    goto: "}[PPP]adhPPkqwTQORRVPTTPUR^XQRORWRQUPRZUQYTR_Y",
    nodeNames: "⚠ LineComment Program Command Body Property Value String Identifier",
    maxTerm: 55,
    skippedNodes: [0, 1],
    repeatNodeCount: 3,
    tokenData: "Bb~RqXY#YYZ#Y]^#Ypq#Y}!O#k!Q![#k![!]$P!]!^$U!c!}#k#R#S#k#T#o#k$q$r$mCZC[&yC[C](^C^C_)yC`Ca+hCbCc,sCcCd-pCeCf.XCfCg0YCgCh0qCiCj1YCjCk1qCmCn2YCuCv3iCvCw7jCxCy8RCyCz8jCzC{;qC|C}=WEUEV?]FRFS@^FXFY@{~#_S^~XY#YYZ#Y]^#Ypq#Y~#pTW~}!O#k!Q![#k!c!}#k#R#S#k#T#o#k~$UOr~~$ZSP~OY$UZ;'S$U;'S;=`$g<%lO$U~$jP;=`<%l$U~$pWOr$ms#O$m#O#P%Y#P%R$m%R%S&U%S;'S$m;'S;=`&s<%lO$m~%]RO;'S$m;'S;=`%f;=`O$m~%iXOr$ms#O$m#O#P%Y#P%R$m%R%S&U%S;'S$m;'S;=`&s;=`<%l$m<%lO$m~&ZWV~Or$ms#O$m#O#P%Y#P%R$m%R%S&U%S;'S$m;'S;=`&s<%lO$m~&vP;=`<%l$m~&|PCzC{'P~'SPCcCd'V~'YPCZC[']~'`PCfCg'c~'fPC{C|'i~'lPpq'o~'rPCuCv'u~'xPC|C}'{~(OPCzC{(R~(UPC^C_(X~(^Om~~(aPCeCf(d~(gQC|C}(mE^E_)h~(pPCfCg(s~(vPCeCf(y~(|PCgCh)P~)SPCZC[)V~)YPCzC{)]~)`PFvFw)c~)hOi~~)kPCgCh)n~)qPC[C])t~)yO!O~~)|RCiCj*VCyCz*nC|C}+P~*YPC|C}*]~*`PFvFw*c~*fPCeCf*i~*nOy~~*qPCZC[*t~*wPCyCz*z~+POs~~+SPCjCk+V~+YPFvFw+]~+`PCaCb+c~+hOe~~+kRCcCd+tCmCn,VC{C|,h~+wPC|C}+z~+}PCxCy,Q~,VO!V~~,YPC[C],]~,`PC{C|,c~,hO!P~~,kPC^C_,n~,sOc~~,vPCkCl,y~-OP!Q~pq-R~-UPC[C]-X~-[PCmCn-_~-bPCcCd-e~-hPFvFw-k~-pOz~~-sPFRFS-v~-yPCyCz-|~.PPC{C|.S~.XO{~~.[QCcCd.bCzC{.s~.ePFvFw.h~.kPCuCv.n~.sO!W~~.vPFXFY.y~/OPn~pq/R~/UPEUEV/X~/[PCgCh/_~/bPpq/e~/hPCfCg/k~/nPCyCz/q~/tPFvFw/w~/zPCzC{/}~0QPC{C|0T~0YOl~~0]PC[C]0`~0cPCZC[0f~0iPCzC{0l~0qOb~~0tPC^C_0w~0zPC|C}0}~1QPCzC{1T~1YO!X~~1]PCuCv1`~1cPCaCb1f~1iPC{C|1l~1qO_~~1tPCbCc1w~1zPFvFw1}~2QPCyCz2T~2YOu~R2]PCzC{2`R2cPC|C}2fR2iPCZC[2lR2oPCzC{2rR2wPaQpq2zP2}PFXFY3QP3TPCeCf3WP3ZPC|C}3^P3aPC{C|3dP3iOxP~3lRCZC[3uCeCf4^C{C|5_~3xPCiCj3{~4OPCxCy4R~4UPC{C|4X~4^Op~~4aPCyCz4d~4gPC^C_4j~4mPpq4p~4sPCyCz4v~4yPC^C_4|~5PPCzC{5S~5VPFvFw5Y~5_Oh~~5bPCeCf5e~5hPCgCh5k~5nPC^C_5q~5tPpq5w~5zQCnCo6QCyCz7R~6TPFvFw6W~6ZPCeCf6^~6aPpq6d~6gPCyCz6j~6mPCeCf6p~6sPC^C_6v~6yPC[C]6|~7RO!S~~7UPCeCf7X~7[PC^C_7_~7bPC[C]7e~7jO!T~~7mPCkCl7p~7sPCmCn7v~7yPC{C|7|~8ROv~~8UPFvFw8X~8[PCzC{8_~8bPFRFS8e~8jO!R~~8mSCaCb8yCeCf:rCzC{:}C|C};`~8|QC^C_9SCcCd9e~9VPC|C}9Y~9]PCZC[9`~9eO`~~9hPC|C}9k~9nPCcCd9q~9tPC{C|9w~9zPpq9}~:QPCzC{:T~:WPCyCz:Z~:^PCZC[:a~:dPFvFw:g~:jPChCi:m~:rOj~~:uPCfCg:x~:}Oq~~;QPC[C];T~;WPCmCn;Z~;`Ok~~;cPCeCf;f~;iPCcCd;l~;qO!U~~;tQCyCz;zC|C}<c~;}PCZC[<Q~<TPFvFw<W~<ZPC{C|<^~<cOg~~<fPFvFw<i~<lPCgCh<o~<rPCzC{<u~<xPCcCd<{~=OPC{C|=R~=WOd~~=ZQCeCf=aFvFw=x~=dPC|C}=g~=jPCcCd=m~=pPFvFw=s~=xO|~~={PCeCf>O~>RPCZC[>U~>XPFvFw>[~>_PChCi>b~>ePFXFY>h~>kPCeCf>n~>qPpq>t~>wPCyCz>z~>}PC^C_?Q~?TPCzC{?W~?]O}~~?`PCZC[?c~?fPCeCf?i~?lPCZC[?o~?rPFXFY?u~?xPCeCf?{~@OPCZC[@R~@UPCuCv@X~@^Ot~~@aPCxCy@d~@gPCyCz@j~@mPCZC[@p~@sPC^C_@v~@{Of~~AOPCeCfAR~AUQCcCdA[C|C}Ag~A_PFvFwAb~AgOo~~AjPC{C|Am~ApP$I`$IaAs~AvPC[C]Ay~A|PCzC{BP~BSPCcCdBV~BYPFvFwB]~BbOw~",
    tokenizers: [0, 1],
    topRules: {"Program": [0, 2]},
    tokenPrec: 0
});

const SALAMLanguage = LRLanguage.define({
    parser: parser.configure({
        props: [indentNodeProp.add({
            Application: context => context.column(context.node.from) + context.unit
            // Application: delimitedIndent({ closing: ")", align: false })
        }), foldNodeProp.add({
            Application: foldInside
        }), styleTags({
            Identifier: tags.variableName,
            Boolean: tags.bool,
            String: tags.string,
            LineComment: tags.lineComment,
            "( )": tags.paren
        })]
    }), languageData: {
        // commentTokens: { line: ";" }
    }
});

const exampleCompletion = SALAMLanguage.data.of({
    autocomplete: completeFromList([// Tags
        {label: "صفحه", type: "keyword"}, {label: "تمام", type: "keyword"}, {
            label: "پاراگراف",
            type: "keyword"
        }, {label: "ضخیم", type: "keyword"}, {label: "قطعه", type: "keyword"}, {
            label: "گروه‌بندی",
            type: "keyword"
        }, {label: "عنوان گروه", type: "keyword"}, {label: "تصویر", type: "keyword"}, {
            label: "پیوند",
            type: "keyword"
        }, {label: "خط", type: "keyword"}, {label: "خط بعدی", type: "keyword"}, {
            label: "دکمه",
            type: "keyword"
        }, {label: "ورودی", type: "keyword"}, {label: "ویرایشگر متن", type: "keyword"}, {
            label: "برچسب",
            type: "keyword"
        }, {label: "جعبه", type: "keyword"}, {label: "فهرست غیر مرتب", type: "keyword"}, {
            label: "فهرست مرتب",
            type: "keyword"
        }, {label: "مورد", type: "keyword"}, {label: "جدول", type: "keyword"}, {
            label: "ردیف",
            type: "keyword"
        }, {label: "ستون", type: "keyword"}, // Attributes
        {label: "عرض", type: "keyword"}, {label: "ارتفاع", type: "keyword"}, {
            label: "رنگ برجسبته",
            type: "keyword"
        }, {label: "ظاهر", type: "keyword"}, {label: "نسبت ابعاد", type: "keyword"}, {
            label: "فیلتر پس‌زمینه",
            type: "keyword"
        }, {label: "مشاهده‌پذیری پشت‌نما", type: "keyword"}, {
            label: "تصویر پس‌زمینه",
            type: "keyword"
        }, {label: "پیوست تصویر پس‌زمینه", type: "keyword"}, {
            label: "حالت ترکیب پس‌زمینه",
            type: "keyword"
        }, {label: "برش پس‌زمینه", type: "keyword"}, {label: "رنگ پس‌زمینه", type: "keyword"}, {
            label: "مبدا پس‌زمینه",
            type: "keyword"
        }, {label: "مبنای انعطاف", type: "keyword"}, {
            label: "موقعیت پس‌زمینه",
            type: "keyword"
        }, {label: "موقعیت افقی پس‌زمینه", type: "keyword"}, {
            label: "موقعیت عمودی پس‌زمینه",
            type: "keyword"
        }, {label: "تکرار پس‌زمینه", type: "keyword"}, {label: "اندازه پس‌زمینه", type: "keyword"}, {
            label: "گردی",
            type: "keyword"
        }, {label: "مرز", type: "keyword"}, {
            label: "رنگ مرز انتهایی بلوک",
            type: "keyword"
        }, {label: "سبک مرز انتهایی بلوک", type: "keyword"}, {
            label: "عرض مرز انتهایی بلوک",
            type: "keyword"
        }, {label: "رنگ مرز ابتدایی بلوک", type: "keyword"}, {
            label: "سبک مرز ابتدایی بلوک",
            type: "keyword"
        }, {label: "عرض مرز ابتدایی بلوک", type: "keyword"}, {
            label: "رنگ مرز پایین",
            type: "keyword"
        }, {label: "گردی پایین چپ", type: "keyword"}, {
            label: "گردی پایین راست",
            type: "keyword"
        }, {label: "سبک مرز پایین", type: "keyword"}, {label: "عرض مرز پایین", type: "keyword"}, {
            label: "ادغام مرز",
            type: "keyword"
        }, {label: "گردی انتها", type: "keyword"}, {label: "گردی شروع", type: "keyword"}, {
            label: "برآمدگی تصویر مرز",
            type: "keyword"
        }, {label: "تکرار تصویر مرز", type: "keyword"}, {
            label: "برش تصویر مرز",
            type: "keyword"
        }, {label: "منبع تصویر مرز", type: "keyword"}, {
            label: "عرض تصویر مرز",
            type: "keyword"
        }, {label: "رنگ مرز انتهایی خطی", type: "keyword"}, {
            label: "سبک مرز انتهایی خطی",
            type: "keyword"
        }, {label: "عرض مرز انتهایی خطی", type: "keyword"}, {
            label: "رنگ مرز ابتدایی خطی",
            type: "keyword"
        }, {label: "سبک مرز ابتدایی خطی", type: "keyword"}, {
            label: "عرض مرز ابتدایی خطی",
            type: "keyword"
        }, {label: "رنگ مرز چپ", type: "keyword"}, {label: "سبک مرز چپ", type: "keyword"}, {
            label: "عرض مرز چپ",
            type: "keyword"
        }, {label: "رنگ مرز راست", type: "keyword"}, {label: "سبک مرز راست", type: "keyword"}, {
            label: "عرض مرز راست",
            type: "keyword"
        }, {label: "فاصله مرز", type: "keyword"}, {
            label: "گردی ابتدا و انتها",
            type: "keyword"
        }, {label: "شعاع ابتدایی شروع مرز", type: "keyword"}, {
            label: "رنگ مرز بالا",
            type: "keyword"
        }, {label: "گردی بالا چپ", type: "keyword"}, {label: "گردی بالا راست", type: "keyword"}, {
            label: "سبک مرز بالا",
            type: "keyword"
        }, {label: "عرض مرز بالا", type: "keyword"}, {label: "پایین", type: "keyword"}, {
            label: "اندازه‌گیری جعبه",
            type: "keyword"
        }, {label: "سایه جعبه", type: "keyword"}, {label: "شکست درون", type: "keyword"}, {
            label: "شکست قبل",
            type: "keyword"
        }, {label: "شکست بعد", type: "keyword"}, {label: "موقعیت عنوان", type: "keyword"}, {
            label: "رنگ نشانگر متنی",
            type: "keyword"
        }, {label: "پاک‌سازی", type: "keyword"}, {label: "مسیر برش", type: "keyword"}, {
            label: "قاعده برش",
            type: "keyword"
        }, {label: "رنگ", type: "keyword"}, {
            label: "درهم‌آمیزی رنگ",
            type: "keyword"
        }, {label: "درهم‌آمیزی رنگ فیلترها", type: "keyword"}, {
            label: "طرح رنگ",
            type: "keyword"
        }, {label: "تعداد ستون‌ها", type: "keyword"}, {
            label: "پر کردن ستون‌ها",
            type: "keyword"
        }, {label: "فاصله بین ستون‌ها", type: "keyword"}, {
            label: "رنگ خط افقی ستون",
            type: "keyword"
        }, {label: "سبک خط افقی ستون", type: "keyword"}, {
            label: "عرض خط افقی ستون",
            type: "keyword"
        }, {label: "گستردگی ستون‌ها", type: "keyword"}, {label: "ستون‌ها", type: "keyword"}, {
            label: "حاوی بودن",
            type: "keyword"
        }, {label: "اندازه بلوک ذاتی", type: "keyword"}, {
            label: "ارتفاع ذاتی",
            type: "keyword"
        }, {label: "اندازه درون‌خطی ذاتی", type: "keyword"}, {
            label: "اندازه ذاتی",
            type: "keyword"
        }, {label: "عرض ذاتی", type: "keyword"}, {label: "ظرف", type: "keyword"}, {
            label: "نام ظرف",
            type: "keyword"
        }, {label: "نوع ظرف", type: "keyword"}, {label: "محتوا", type: "keyword"}, {
            label: "مشاهده محتوا",
            type: "keyword"
        }, {label: "افزایش شمارنده", type: "keyword"}, {
            label: "بازنشانی شمارنده",
            type: "keyword"
        }, {label: "تنظیم شمارنده", type: "keyword"}, {label: "نشانگر", type: "keyword"}, {
            label: "جهت",
            type: "keyword"
        }, {label: "قرارگیری", type: "keyword"}, {label: "سلول‌های خالی", type: "keyword"}, {
            label: "پر کردن",
            type: "keyword"
        }, {label: "شفافیت پر کردن", type: "keyword"}, {label: "قاعده پر کردن", type: "keyword"}, {
            label: "فیلتر",
            type: "keyword"
        }, {label: "انعطاف", type: "keyword"}, {label: "جهت انعطاف", type: "keyword"}, {
            label: "جریان انعطاف",
            type: "keyword"
        }, {label: "رشد انعطاف", type: "keyword"}, {label: "کوچک‌شدن انعطاف", type: "keyword"}, {
            label: "چینش انعطاف",
            type: "keyword"
        }, {label: "شناور", type: "keyword"}, {label: "نام قلم", type: "keyword"}, {
            label: "تنظیمات ویژگی قلم",
            type: "keyword"
        }, {label: "کرنینگ قلم", type: "keyword"}, {
            label: "بازنویسی زبان قلم",
            type: "keyword"
        }, {label: "اندازه‌گیری اپتیکال قلم", type: "keyword"}, {
            label: "اندازه قلم",
            type: "keyword"
        }, {label: "کشیدگی قلم", type: "keyword"}, {label: "سبک قلم", type: "keyword"}, {
            label: "نوع قلم",
            type: "keyword"
        }, {label: "نمایش قلم", type: "keyword"}, {label: "وزن قلم", type: "keyword"}, {
            label: "شبکه",
            type: "keyword"
        }, {label: "منطقه شبکه", type: "keyword"}, {
            label: "ستون‌های خودکار شبکه",
            type: "keyword"
        }, {label: "جریان خودکار شبکه", type: "keyword"}, {
            label: "ردیف‌های خودکار شبکه",
            type: "keyword"
        }, {label: "ستون‌های شبکه", type: "keyword"}, {
            label: "پایان ستون شبکه",
            type: "keyword"
        }, {label: "شروع ستون شبکه", type: "keyword"}, {
            label: "ردیف‌های شبکه",
            type: "keyword"
        }, {label: "پایان ردیف شبکه", type: "keyword"}, {
            label: "شروع ردیف شبکه",
            type: "keyword"
        }, {label: "الگوی شبکه", type: "keyword"}, {
            label: "مناطق الگوی شبکه",
            type: "keyword"
        }, {label: "ستون‌های الگوی شبکه", type: "keyword"}, {
            label: "ردیف‌های الگوی شبکه",
            type: "keyword"
        }, {label: "توجیه محتوا", type: "keyword"}, {label: "چپ", type: "keyword"}, {
            label: "فاصله بین حروف",
            type: "keyword"
        }, {label: "ارتفاع خط", type: "keyword"}, {label: "سبک فهرست", type: "keyword"}, {
            label: "فاصله",
            type: "keyword"
        }, {label: "فاصله پایین", type: "keyword"}, {label: "فاصله چپ", type: "keyword"}, {
            label: "فاصله راست",
            type: "keyword"
        }, {label: "فاصله بالا", type: "keyword"}, {label: "حداکثر ارتفاع", type: "keyword"}, {
            label: "حداکثر عرض",
            type: "keyword"
        }, {label: "حداقل ارتفاع", type: "keyword"}, {label: "حداقل عرض", type: "keyword"}, {
            label: "تناسب شیء",
            type: "keyword"
        }, {label: "شفافیت", type: "keyword"}, {label: "بیش از حد", type: "keyword"}, {
            label: "بیش از حد (X)",
            type: "keyword"
        }, {label: "بیش از حد (Y)", type: "keyword"}, {label: "فاصله", type: "keyword"}, {
            label: "فاصله پایین",
            type: "keyword"
        }, {label: "فاصله چپ", type: "keyword"}, {label: "فاصله راست", type: "keyword"}, {
            label: "فاصله بالا",
            type: "keyword"
        }, {label: "زینت متن", type: "keyword"}, {label: "تبدیل متن", type: "keyword"}, {
            label: "قابلیت مشاهده",
            type: "keyword"
        }, {label: "الویت موقعیت", type: "keyword"}, {label: "رنگ مرز", type: "keyword"}, {
            label: "فاصله حاشیه",
            type: "keyword"
        }, {label: "سبک حاشیه", type: "keyword"}, {label: "عرض حاشیه", type: "keyword"}, {
            label: "لنگر بیش از حد",
            type: "keyword"
        }, {label: "بیش از حد بلوک", type: "keyword"}, {
            label: "فاصله برش بیش از حد",
            type: "keyword"
        }, {label: "بیش از حد درون خطی", type: "keyword"}, {
            label: "پیچش بیش از حد",
            type: "keyword"
        }, {label: "فاصله بلوک", type: "keyword"}, {
            label: "فاصله انتهای بلوک",
            type: "keyword"
        }, {label: "فاصله شروع بلوک", type: "keyword"}, {
            label: "فاصله درون خطی",
            type: "keyword"
        }, {label: "فاصله انتهای درون خطی", type: "keyword"}, {
            label: "فاصله شروع درون خطی",
            type: "keyword"
        }, {label: "صفحه", type: "keyword"}, {label: "شکست صفحه بعد از", type: "keyword"}, {
            label: "شکست صفحه قبل از",
            type: "keyword"
        }, {label: "شکست صفحه درون", type: "keyword"}, {label: "ترتیب نقاشی", type: "keyword"}, {
            label: "پرسپکتیو",
            type: "keyword"
        }, {label: "مبدأ پرسپکتیو", type: "keyword"}, {label: "محتوای مکان", type: "keyword"}, {
            label: "موارد مکان",
            type: "keyword"
        }, {label: "خود مکان", type: "keyword"}, {label: "رویدادهای اشاره‌گر", type: "keyword"}, {
            label: "موقعیت",
            type: "keyword"
        }, {label: "تنظیم رنگ چاپ", type: "keyword"}, {label: "نقل‌قول", type: "keyword"}, {
            label: "شعاع",
            type: "keyword"
        }, {label: "تغییر اندازه", type: "keyword"}, {label: "راست", type: "keyword"}, {
            label: "چرخش",
            type: "keyword"
        }, {label: "فاصله ردیف", type: "keyword"}, {label: "هم‌راستایی روبی", type: "keyword"}, {
            label: "موقعیت روبی",
            type: "keyword"
        }, {label: "شعاع X", type: "keyword"}, {label: "شعاع Y", type: "keyword"}, {
            label: "مقیاس",
            type: "keyword"
        }, {label: "رفتار پیمایش", type: "keyword"}, {
            label: "فاصله پیمایش",
            type: "keyword"
        }, {label: "فاصله بلوک پیمایش", type: "keyword"}, {
            label: "فاصله انتهای بلوک پیمایش",
            type: "keyword"
        }, {label: "فاصله شروع بلوک پیمایش", type: "keyword"}, {
            label: "فاصله پایین پیمایش",
            type: "keyword"
        }, {label: "فاصله درون خطی پیمایش", type: "keyword"}, {
            label: "فاصله انتهای درون خطی پیمایش",
            type: "keyword"
        }, {label: "فاصله شروع درون خطی پیمایش", type: "keyword"}, {
            label: "فاصله چپ پیمایش",
            type: "keyword"
        }, {label: "فاصله راست پیمایش", type: "keyword"}, {
            label: "فاصله بالا پیمایش",
            type: "keyword"
        }, {label: "فاصله پیمایش", type: "keyword"}, {
            label: "فاصله بلوک پیمایش",
            type: "keyword"
        }, {label: "فاصله انتهای بلوک پیمایش", type: "keyword"}, {
            label: "فاصله شروع بلوک پیمایش",
            type: "keyword"
        }, {label: "فاصله پایین پیمایش", type: "keyword"}, {
            label: "فاصله درون خطی پیمایش",
            type: "keyword"
        }, {label: "فاصله انتهای درون خطی پیمایش", type: "keyword"}, {
            label: "فاصله شروع درون خطی پیمایش",
            type: "keyword"
        }, {label: "فاصله چپ پیمایش", type: "keyword"}, {
            label: "فاصله راست پیمایش",
            type: "keyword"
        }, {label: "فاصله بالا پیمایش", type: "keyword"}, {label: "تراز پیمایش", type: "keyword"}, {
            label: "نوع پیمایش",
            type: "keyword"
        }, {label: "شکل خارج", type: "keyword"}, {label: "تراز متن", type: "keyword"}, {
            label: "تراز آخرین متن",
            type: "keyword"
        }, {label: "تراز‌کردن‌ اقلام", type: "keyword"}, {label: "تورفتگی متن", type: "keyword"}, {
            label: "بالا",
            type: "keyword"
        }, {label: "تبدیل", type: "keyword"}, {label: "مرکز تبدیل", type: "keyword"}, {
            label: "ترجمه",
            type: "keyword"
        }, {label: "معکوس یونیکد", type: "keyword"}, {
            label: "انتخاب کاربر",
            type: "keyword"
        }, {label: "تغییر خواهد کرد", type: "keyword"}, {label: "باکس تبدیل", type: "keyword"}, {
            label: "سبک تبدیل",
            type: "keyword"
        }, {label: "انتقال", type: "keyword"}, {label: "رفتار انتقال", type: "keyword"}, {
            label: "تاخیر انتقال",
            type: "keyword"
        }, {label: "مدت انتقال", type: "keyword"}, {
            label: "ویژگی انتقال",
            type: "keyword"
        }, {label: "تابع زمان‌بندی انتقال", type: "keyword"}, {
            label: "اثر وکتور",
            type: "keyword"
        }, {label: "تراز عمودی", type: "keyword"}, {label: "فضای سفید", type: "keyword"}, {
            label: "بیوه‌ها",
            type: "keyword"
        }, {label: "شکستن کلمه", type: "keyword"}, {label: "فاصله کلمه", type: "keyword"}, {
            label: "حالت نوشتن",
            type: "keyword"
        }, {label: "بزرگنمایی", type: "keyword"}])
});

function SALAM() {
    return new LanguageSupport(SALAMLanguage, [exampleCompletion])
}

const customTheme = EditorView.theme({
    '&': {
        font: "Vazirmatn, Tahoma, Arial",
    }
})

const elm_editor = document.querySelector(".code");
const editor_options = {
    parent: elm_editor,
    styleActiveLine: true,
    lineNumbers: true,
    matchBrackets: true,
    autoCloseBrackets: true,
    autoCloseTags: true,
    extensions: [basicSetup, SALAM(), // customTheme,
    ],
};
const editor = new EditorView(editor_options);
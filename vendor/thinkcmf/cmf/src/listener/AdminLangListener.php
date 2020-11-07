<?php
// +---------------------------------------------------------------------
// | ThinkCMF [ WE CAN DO IT MORE SIMPLE ]
// +---------------------------------------------------------------------
// | Copyright (c) 2013-2019 http://www.thinkcmf.com All rights reserved.
// +---------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +---------------------------------------------------------------------
// | Author: Dean <zxxjjforever@163.com>
// +---------------------------------------------------------------------
namespace cmf\listener;

use think\facade\Env;
use think\facade\Lang;

class AdminLangListener
{
    protected static $run = false;

    // 行为扩展的执行入口必须是run
    public function handle()
    {
        if (self::$run) {
            return;
        }
        self::$run = true;

        $app     = app();
        $langSet = $app->lang->getLangSet();

        // 加载核心应用后台菜单语言包
        $coreApps = ['admin', 'user'];
        foreach ($coreApps as $appName) {
            $app->lang->load([
                root_path() . "vendor/thinkcmf/cmf-app/src/{$appName}/lang/{$langSet}/admin_menu.php",
                root_path() . "vendor/thinkcmf/cmf-app/src/{$appName}/lang/{$langSet}/admin.php"
            ]);
        }

        // 加载应用后台菜单语言包
//        $apps = cmf_scan_dir(APP_PATH . '*', GLOB_ONLYDIR);
//        foreach ($apps as $app) {
//            $app->lang->load([
//                APP_PATH . $app . DIRECTORY_SEPARATOR . 'lang' . DIRECTORY_SEPARATOR . $langSet . DIRECTORY_SEPARATOR . 'admin_menu.php',
//                APP_PATH . $app . DIRECTORY_SEPARATOR . 'lang' . DIRECTORY_SEPARATOR . $langSet . DIRECTORY_SEPARATOR . 'admin.php',
//            ]);
//        }

        // 加后台菜单动态语言包
//        $defaultLangDir = config('DEFAULT_LANG');
//        Lang::load([
//            CMF_DATA . "lang/" . $defaultLangDir . "/admin_menu.php"
//        ]);
    }
}

<?php namespace JofrySutanto\CustomFields;

use Event;
use Backend;
use Cms\Classes\Theme;
use Cms\Classes\Controller as CmsController;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{

    protected static $lang_path = 'jofrysutanto.customfields::';

    public function pluginDetails()
    {
        return [
            'name'        => static::$lang_path . 'lang.plugin.name',
            'description' => static::$lang_path . 'lang.plugin.description',
            'author'      => 'Jofry Sutanto',
            'icon'        => 'icon-gear',
            'homepage'    => 'https://github.com/jofrysutanto/custom-fields'
        ];
    }

    public function registerComponents()
    {
        return [
            
        ];
    }

    public function registerPermissions()
    {
        return [
            
        ];
    }

    public function registerNavigation()
    {
        return [
            'customfields' => [
                'label'       => static::$lang_path . 'lang.plugin.name',
                'url'         => Backend::url('jofrysutanto/customfields'),
                'icon'        => 'icon-files-o',
                'permissions' => ['*'],
                'order'       => 20,

                'sideMenu' => [
                    'customfields' => [
                        'label'       => static::$lang_path . 'lang.plugin.name',
                        'icon'        => 'icon-files-o',
                        'url'         => 'javascript:;',
                        'attributes'  => ['data-menu-item'=>'pages'],
                        'permissions' => ['*']
                    ]
                ]
            ]
        ];
    }

    public function boot()
    {
        // Event::listen('cms.router.beforeRoute', function($url) {
        //     return Controller::instance()->initCmsPage($url);
        // });

        // Event::listen('cms.page.beforeRenderPage', function($controller, $page) {
        //     /*
        //      * Before twig renders
        //      */
        //     $twig = $controller->getTwig();
        //     $loader = $controller->getLoader();
        //     Controller::instance()->injectPageTwig($page, $loader, $twig);

        //     /*
        //      * Get rendered content
        //      */
        //     $contents = Controller::instance()->getPageContents($page);
        //     if (strlen($contents)) {
        //         return $contents;
        //     }
        // });

        // Event::listen('cms.page.initComponents', function($controller, $page) {
        //     Controller::instance()->initPageComponents($controller, $page);
        // });

        // Event::listen('cms.block.render', function($blockName, $blockContents) {
        //     $page = CmsController::getController()->getPage();

        //     if (!isset($page->apiBag['staticPage'])) {
        //         return;
        //     }

        //     $contents = Controller::instance()->getPlaceholderContents($page, $blockName, $blockContents);
        //     if (strlen($contents)) {
        //         return $contents;
        //     }
        // });

        // Event::listen('backend.form.extendFieldsBefore', function($formWidget) {
        //     if ($formWidget->model instanceof \Cms\Classes\Partial) {
        //         Snippet::extendPartialForm($formWidget);
        //     }
        // });

        // Event::listen('cms.template.save', function($controller, $template, $type) {
        //     Plugin::clearCache();
        // });

        // Event::listen('cms.template.processSettingsBeforeSave', function($controller, $dataHolder) {
        //     $dataHolder->settings = Snippet::processTemplateSettingsArray($dataHolder->settings);
        // });

        // Event::listen('cms.template.processSettingsAfterLoad', function($controller, $template) {
        //     Snippet::processTemplateSettings($template);
        // });

        // Event::listen('cms.template.processTwigContent', function($template, $dataHolder) {
        //     if ($template instanceof \Cms\Classes\Layout) {
        //         $dataHolder->content = Controller::instance()->parseSyntaxFields($dataHolder->content);
        //     }
        // });

        // Event::listen('backend.richeditor.listTypes', function () {
        //     return [
        //         'static-page' => 'Static page',
        //     ];
        // });

        // Event::listen('backend.richeditor.getTypeInfo', function ($type) {
        //     if ($type == 'static-page') {
        //         return StaticPage::getRichEditorTypeInfo($type);
        //     }
        // });
    }

    /**
     * Register new Twig variables
     * @return array
     */
    public function registerMarkupTags()
    {
        return [
            'filters' => [
                // 'staticPage' => ['RainLab\Pages\Classes\Page', 'url']
            ]
        ];
    }

    public static function clearCache()
    {
        $theme = Theme::getEditTheme();

        // $router = new Router($theme);
        // $router->clearCache();

        // StaticPage::clearMenuCache($theme);
        // SnippetManager::clearCache($theme);
    }
}

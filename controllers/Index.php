<?php namespace JofrySutanto\CustomFields\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Cms\Classes\Theme;
use JofrySutanto\CustomFields\Widgets\FieldGroupList;

/**
 * Index Back-end Controller
 */
class Index extends Controller
{

    protected $activeFieldGroup = null;

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('JofrySutanto.CustomFields', 'customfields', 'customfields');

        try {
            if (!($this->theme = Theme::getEditTheme())) {
                throw new ApplicationException(Lang::get('cms::lang.theme.edit.not_found'));
            }

            new FieldGroupList($this, 'groupList');

            $theme = $this->theme;
        }
        catch (Exception $ex) {
            $this->handleError($ex);
        }
    }

    public function index()
    {
        $this->pageTitle = 'Hello world!';
        $this->vars['title'] = 'Hello world';
    } 

    public function update($dataId)
    {

        $this->setActiveFieldGroup($dataId);

        $this->pageTitle = 'Update field groups';
        $this->vars['title'] = 'Hello world';
    }

    public function getActiveFieldGroup()
    {
        return $this->activeFieldGroup;
    }

    public function setActiveFieldGroup($id)
    {
        $this->activeFieldGroup = $id;
    }

}
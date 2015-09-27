<?php namespace JofrySutanto\CustomFields\Widgets;

use Backend\Classes\WidgetBase;
use Cms\Classes\Theme;
use Input;
use Lang;
use JofrySutanto\CustomFields\Classes\FieldGroup;
use Request;
use Response;
use Str;

/**
 * Field group list widget.
 *
 * @package jofrysutanto\custom-fields
 * @author Jofry Sutanto
 */
class FieldGroupList extends WidgetBase
{
    use \Backend\Traits\SearchableWidget;
    use \Backend\Traits\SelectableWidget;

    protected $theme;

    protected $dataIdPrefix;

    /**
     * @var string Message to display when the Delete button is clicked.
     */
    public $deleteConfirmation = 'rainlab.pages::lang.menu.delete_confirmation';

    public $noRecordsMessage = 'rainlab.pages::lang.menu.no_records';

    public function __construct($controller, $alias)
    {
        $this->alias = $alias;
        $this->theme = Theme::getEditTheme();
        $this->dataIdPrefix = 'page-'.$this->theme->getDirName();

        parent::__construct($controller, []);
        $this->bindToController();
    }

    /**
     * Renders the widget.
     * @return string
     */
    public function render()
    {
        return $this->makePartial('body', [
            'data' => $this->getData()
        ]);
    }

    /**
     * Returns information about this widget, including name and description.
     */
    public function widgetDetails() {}

    //
    // Event handlers
    //

    public function onUpdate()
    {
        $this->extendSelection();

        return $this->updateList();
    }

    public function onSearch()
    {
        $this->setSearchTerm(Input::get('search'));
        $this->extendSelection();

        return $this->updateList();
    }

    //
    // Methods for the internal use
    //

    protected function getData()
    {
        $fieldGroups = FieldGroup::listInTheme($this->theme, true);

        return $fieldGroups;
    }

    protected function updateList()
    {
        $vars = ['items' => $this->getData()];
        return ['#'.$this->getId('field-group-list') => $this->makePartial('items', $vars)];
    }

    protected function getThemeSessionKey($prefix)
    {
        return $prefix . $this->theme->getDirName();
    }

    protected function getSession($key = null, $default = null)
    {
        $key = strlen($key) ? $this->getThemeSessionKey($key) : $key;

        return parent::getSession($key, $default);
    }

    protected function putSession($key, $value) 
    {
        return parent::putSession($this->getThemeSessionKey($key), $value);
    }
}

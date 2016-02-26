<?php

/**
 * Form processing class
 * Class Form
 */
class Form
{
    /**
     * @var string $module Module name
     */
    protected $module;
    /**
     * @var string $table Module table name
     */
    protected $table;
    /**
     * @var int $id The current record id
     */
    protected $id;
    /**
     * @var array $elements The form elements.
     */
    protected $elements;
    /**
     * @var mixed $data The current form data
     */
    protected $data;

    /**
     * Form constructor.
     * @param array $settings
     */
    public function __construct($settings = array())
    {
        $this->initialize($settings);
    }

    /**
     * Initializes the class
     * @param $settings
     * @return null
     * @throws Exception $e
     */
    public function initialize($settings)
    {
        try {
            if (!isset($settings['module'])) {
                throw new Exception('Name of module is required.');
            }
            if (!isset($settings['table'])) {
                throw new Exception('Table name of the module is required.');
            }
            if (!isset($settings['elements'])) {
                throw new Exception('Form elements not supplied.');
            }
            $this->module = $settings['module'];
            $this->table = $settings['table'];
            $this->elements = isset($settings['elements']) ? $settings['elements'] : array();
            $this->id = isset($settings['id']) ? $settings['id'] : 0;
        } catch (Exception $e) {
            show_messages(array($e->getMessage()));
        }
    }

    /**
     * Get add/edit form
     * @return string
     */
    public function getForm()
    {
        try {
            if ($this->id > 0) {
                $this->data = table_fetch_row($this->table, sprintf('id="%d"', $this->id));
            }
            if (empty($this->elements)) {
                throw new Exception('Form elements is empty.');
            }
            ob_start();
            ?>
            <table>
                <tbody>
                <?php foreach ($this->elements as $e) { ?>
                    <tr>
                        <td><?php echo $e['title']; ?></td>
                        <td>
                            <?php echo $this->getElementForm($e); ?>
                        </td>
                    </tr>
                <?php } ?>
                <tr>
                    <td><?php show_big_button('save', 'Save'); ?></td>
                </tr>
                </tbody>
            </table>
            <?php
            $form = ob_get_contents();
            ob_end_clean();
            return $form;
        } catch (Exception $e) {
            show_messages(array($e->getMessage()));
        }
    }

    protected function getElementForm($e)
    {
        $item = '';
        switch ($e['type']) {
            case 'input':
            case 'text':
            case 'email':
            case 'number':
                $item = sprintf('<input type="%s" name="%s" value="%s" placeholder="%s"/>', $e['type'], $e['name'], $this->getValue($e['name']), $this->getPlaceholder($e));
                break;
            case 'file':
            case 'image':
                break;
        }
        return $item;
    }

    protected function getValue($name)
    {
        return isset($this->data[$name]) ? $this->data[$name] : '';
    }

    protected function getPlaceholder($e)
    {
        return isset($e['placeholder']) ? $e['placeholder'] : $e['title'];
    }

}
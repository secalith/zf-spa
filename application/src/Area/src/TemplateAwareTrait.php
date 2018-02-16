<?php
namespace Template;

trait TemplateAwareTrait
{

    protected $template;

    /**
     * @return mixed
     */
    public function getTemplate()
    {
        return $this->template;
    }

    /**
     * @param mixed $template
     * @return TemplateAwareTrait
     */
    public function setTemplate($template)
    {
        $this->template = $template;
        return $this;
    }
}

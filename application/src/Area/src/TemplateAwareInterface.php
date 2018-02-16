<?php

namespace Template;

interface TemplateAwareInterface
{

    public function setTemplate($template);
    public function getTemplate();
}

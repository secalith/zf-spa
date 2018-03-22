<?php

namespace TableData;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface TableDataAwareInterface
{
    /**
     * @param TableData $form
     * @param string|null $name
     * @param bool $strict
     * @return self
     */
    public function addTableData($tableData, $name = null);

    /**
     * @param string $name
     * @return Form|null
     */
    public function getTableData($name);

    /**
     * @param $forms
     * @return self
     */
    public function setTableData($tableData);

}

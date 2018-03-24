<?php

namespace TableData;

trait TableDataAwareTrait
{
    /**
     * @var array|null
     */
    protected $tableData;

    /**
     * @param Form $tableData
     * @param string|null $name
     * @return $this
     */
    public function addTableData($tableData, $name = null)
    {
        $this->tableData[$name] = $tableData;
        return $this;
    }

    /**
     * @param string $name
     * @return Form|null
     */
    public function getTableData($name)
    {
        if ( ! empty($this->tableData) && array_key_exists($name, $this->tableData)) {
            return $this->tableData[$name];
        }
        return null;
    }

    /**
     * @param $tableData
     * @return $this
     */
    public function setTableData($tableData, $name = null)
    {
        $this->tableData[$name] = $tableData;
        return $this;
    }

}

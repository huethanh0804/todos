<?php
class querybuilder extends database
{
    function __construct()
    {
        parent::__construct();
    }
    //data  : mảng có key la ten cột, value là value
    function insert($table, $data = [])
    {
        //data  = [`group_id` =>1, `name`=>'a', `image`, `username`, `password`, `status`, `email`, `phone`, `created_at`]
        //xay cột trc ra luôn dấu hỏi
        $strcolumn = $quest = '';
        $params = [];
        foreach ($data as $column => $value) {
            $strcolumn .= "`$column`,";
            $quest .= '?,';
            $params[] = trim($value);
        }
        $strcolumn = rtrim($strcolumn, ',');
        $quest = rtrim($quest, ',');
        $sql = 'INSERT INTO `' . $table . '` 
        (' . $strcolumn . ') 
        VALUES (' . $quest . ');';
        return $this->setquery($sql)->save($params);
    }
    function update($table, $data = [], $where = [])
    {
        $strset = $strwhere = '';
        $params = [];
        foreach ($data as $column => $value) {
            $strset .= "`$column` = ?,";
            $params[] = trim($value);
        }
        $strset = rtrim($strset, ',');
        //build where đơn gian : where = và ket bằng and
        if ($where) {
            foreach ($where as $column => $value) {
                $strwhere .= " and `$column` = ? ";
                $params[] = trim($value);
            }
        }

        $sql = 'UPDATE `' . $table . '` 
        SET ' . $strset . ' 
        WHERE  1=1 ' . $strwhere;
        return $this->setquery($sql)->save($params);
    }
    function delete($table, $where = [])
    {
        $strwhere = '';
        $params = [];
        //build where đơn gian : where = và ket bằng and
        if ($where) {
            foreach ($where as $column => $value) {
                $strwhere .= " and `$column` = ? ";
                $params[] = trim($value);
            }
        }

        $sql = 'DELETE FROM `' . $table . '`  
        WHERE  1=1 ' . $strwhere;
        return $this->setquery($sql)->save($params);
    }
    function select($table, $where = [], $select = ['*'])
    {
        $strwhere = $strselect = '';
        $params = [];
        //build where đơn gian : where = và ket bằng and
        if ($where) {
            if (count($where) == 3) {
                $strwhere .= " and `" . $where[0] . "` " . $where[1] . " ? ";
                $params[] = trim($where[2]);
            } else {
                foreach ($where as $column => $value) {
                    $strwhere .= " and `$column` = ? ";
                    $params[] = trim($value);
                }
            }
        }
        $strselect = implode(',', $select);
        $sql = 'SELECT ' . $strselect . '  
                FROM `' . $table . '`   
                WHERE  1=1 ' . $strwhere;
        return $this->setquery($sql)->rows($params);
    }
    function item($table, $where = [], $select = ['*'])
    {
        $strwhere = $strselect = '';
        $params = [];
        if ($where) {
            foreach ($where as $column => $value) {
                $strwhere .= " and `$column` = ? ";
                $params[] = trim($value);
            }
        }
        $strselect = implode(',', $select);
        //build where đơn gian : where = và ket bằng and       
        $sql = 'SELECT ' . $strselect . '  
                FROM `' . $table . '`   
                WHERE  1=1 ' . $strwhere;
        return $this->setquery($sql)->row($params);
    }
}

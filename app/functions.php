<?php
/**
 * This file is part of monda-worker.
 *
 * @contact  mondagroup_php@163.com
 *
 */
if (! function_exists('all')) {
    /**
     * all item is true returns true, otherwise returns false.
     */
    function all($items = []): bool
    {
        $result = 1;
        foreach ($items as $item) {
            $result &= intval(boolval($item));
        }

        return boolval($result);
    }
}

if (! function_exists('any')) {
    /**
     * any item is true returns true, otherwise returns false;
     */
    function any($items = []): bool 
    {
        $result = 0;

        foreach ($items as $item) {
            $result |= intval(boolval($item));
        }

        return boolval($result);
    }
}
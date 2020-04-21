<?php
namespace MageMastery\Todo\Api;

/*
 * @api
 */
interface TaskRepositoryInterface
{
    public function getList();
    public function get(int $taskId);
}

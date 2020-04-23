<?php
namespace MageMastery\Todo\Api;

/*
 * @api
 */
use MageMastery\Todo\Api\Data\TaskSearchResultInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;

interface TaskRepositoryInterface
{
    public function getList(SearchCriteriaBuilder $searchCriteria): TaskSearchResultInterface;
    public function get(int $taskId);
}

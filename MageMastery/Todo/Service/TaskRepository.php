<?php
namespace MageMastery\Todo\Service;

use MageMastery\Todo\Api\Data\TaskSearchResultInterface;
use MageMastery\Todo\Api\Data\TaskSearchResultInterfaceFactory;
use MageMastery\Todo\Api\TaskRepositoryInterface;
use MageMastery\Todo\Model\ResourceModel\Task;
use MageMastery\Todo\Model\TaskFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Api\SearchCriteriaBuilder;

class TaskRepository implements TaskRepositoryInterface
{
    /**
     * @var Task
     */
    private $resource;

    /**
     * @var TaskFactory
     */
    private $taskFactory;

    /**
     * @var SearchResultFactory
     */
    private $searchResultFactory;

    /**
     * @var CollectionProcessor
     */
    private $collectionProcessor;

    /**
     * TaskRepository constructor.
     * @param Task $resource
     * @param TaskFactory $taskFactory
     * @param CollectionProcessorInterface $collectionProcessor
     * @param TaskSearchResultInterfaceFactory $searchResultFactory
     */
    public function __construct(
        Task $resource,
        TaskFactory $taskFactory,
        CollectionProcessorInterface $collectionProcessor,
        TaskSearchResultInterfaceFactory $searchResultFactory
    ) {
        $this->resource = $resource;
        $this->taskFactory = $taskFactory;
        $this->collectionProcessor=$collectionProcessor;
        $this->searchResultFactory=$searchResultFactory;
    }

    public function getList(SearchCriteriaBuilder $searchCriteria): TaskSearchResultInterface
    {
        $searchResult=$this->searchResultFactory->create();
        $searchResult->setSearchCriteria($searchCriteria);
        $this->collectionProcessor->process($searchCriteria,$searchResult);
        return $searchResult;
    }

    public function get(int $taskId)
    {
        $object = $this->taskFactory->create();
        $this->resource->load($object,$taskId);
        return $object;
    }

}

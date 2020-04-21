<?php
namespace MageMastery\Todo\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use MageMastery\Todo\Model\Task;
use MageMastery\Todo\Model\ResourceModel\Task as TaskResource;
use MageMastery\Todo\Model\TaskFactory;


class Index extends Action
{
    private $taskResource;
    private $taskFactory;

    public function __construct(Context $context, TaskFactory $taskFactory, TaskResource $taskResource)
    {
        $this->taskFactory = $taskFactory;
        $this->taskResource = $taskResource;

        parent::__construct($context);
    }

    public function execute()
    {
        $task = $this->taskFactory->create();
        $task->setData([
            'label' => 'New Task 22',
            'status' => 'open',
            'customer_id' => 1
        ]);
        $this->taskResource->save($task);

        return $this->resultFactory->create(ResultFactory::TYPE_PAGE);
    }
}

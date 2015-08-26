<?php

namespace TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Category
 */
class Category
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $Category;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $Task;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Task = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set Category
     *
     * @param string $category
     * @return Category
     */
    public function setCategory($category)
    {
        $this->Category = $category;

        return $this;
    }

    /**
     * Get Category
     *
     * @return string 
     */
    public function getCategory()
    {
        return $this->Category;
    }

    /**
     * Add Task
     *
     * @param \TaskBundle\Entity\Task $task
     * @return Category
     */
    public function addTask(\TaskBundle\Entity\Task $task)
    {
        $this->Task[] = $task;

        return $this;
    }

    /**
     * Remove Task
     *
     * @param \TaskBundle\Entity\Task $task
     */
    public function removeTask(\TaskBundle\Entity\Task $task)
    {
        $this->Task->removeElement($task);
    }

    /**
     * Get Task
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTask()
    {
        return $this->Task;
    }
}

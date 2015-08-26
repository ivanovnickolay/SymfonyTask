<?php

namespace TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Task
 */
class Task
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name_task;

    /**
     * @var \DateTime
     */
    private $begin_task;

    /**
     * @var \DateTime
     */
    private $end_task;

    /**
     * @var string
     * Описание задачи
     */
    private $description;

    /**
     * @var string
     * true когда робота закончена 
     * false когда робота НЕ закончена  
     */
    private $vajnoct;

    /**
     * @var boolean
     */
    private $final;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * ссылка на подзадачи данный задачи в табице Subtask
     */
    private $Subtask;

    /**
     * @var \TaskBundle\Entity\Category
     * ссылка на категорию задачи 
     */
    private $Category;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->Subtask = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set name_task
     *
     * @param string $nameTask
     * @return Task
     */
    public function setNameTask($nameTask)
    {
        $this->name_task = $nameTask;

        return $this;
    }

    /**
     * Get name_task
     *
     * @return string 
     */
    public function getNameTask()
    {
        return $this->name_task;
    }

    /**
     * Set begin_task
     *
     * @param \DateTime $beginTask
     * @return Task
     */
    public function setBeginTask($beginTask)
    {
        $this->begin_task = $beginTask;

        return $this;
    }

    /**
     * Get begin_task
     *
     * @return \DateTime 
     */
    public function getBeginTask()
    {
        return $this->begin_task;
    }

    /**
     * Set end_task
     *
     * @param \DateTime $endTask
     * @return Task
     */
    public function setEndTask($endTask)
    {
        $this->end_task = $endTask;

        return $this;
    }

    /**
     * Get end_task
     *
     * @return \DateTime 
     */
    public function getEndTask()
    {
        return $this->end_task;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Task
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set vajnoct
     *
     * @param string $vajnoct
     * @return Task
     */
    public function setVajnoct($vajnoct)
    {
        $this->vajnoct = $vajnoct;

        return $this;
    }

    /**
     * Get vajnoct
     *
     * @return string 
     */
    public function getVajnoct()
    {
        return $this->vajnoct;
    }

    /**
     * Set final
     *
     * @param boolean $final
     * @return Task
     */
    public function setFinal($final)
    {
        $this->final = $final;

        return $this;
    }

    /**
     * Get final
     *
     * @return boolean 
     */
    public function getFinal()
    {
        return $this->final;
    }

    /**
     * Add Subtask
     *
     * @param \TaskBundle\Entity\Subtask $subtask
     * @return Task
     */
    public function addSubtask(\TaskBundle\Entity\Subtask $subtask)
    {
        $this->Subtask[] = $subtask;

        return $this;
    }

    /**
     * Remove Subtask
     *
     * @param \TaskBundle\Entity\Subtask $subtask
     */
    public function removeSubtask(\TaskBundle\Entity\Subtask $subtask)
    {
        $this->Subtask->removeElement($subtask);
    }

    /**
     * Get Subtask
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubtask()
    {
        return $this->Subtask;
    }

    /**
     * Set Category
     *
     * @param \TaskBundle\Entity\Category $category
     * @return Task
     */
    public function setCategory(\TaskBundle\Entity\Category $category = null)
    {
        $this->Category = $category;

        return $this;
    }

    /**
     * Get Category
     *
     * @return \TaskBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->Category;
    }
}

<?php

namespace TaskBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subtask
 */
class Subtask
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $Subtask;

    /**
     * @var \DateTime
     */
    private $begin;

    /**
     * @var \DateTime
     */
    private $end;

    /**
     * @var integer
     */
    private $percent;

    /**
     * @var boolean
     */
    private $final;

    /**
     * @var \TaskBundle\Entity\Task
     */
    private $Task;


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
     * Set Subtask
     *
     * @param string $subtask
     * @return Subtask
     */
    public function setSubtask($subtask)
    {
        $this->Subtask = $subtask;

        return $this;
    }

    /**
     * Get Subtask
     *
     * @return string 
     */
    public function getSubtask()
    {
        return $this->Subtask;
    }

    /**
     * Set begin
     *
     * @param \DateTime $begin
     * @return Subtask
     */
    public function setBegin($begin)
    {
        $this->begin = $begin;

        return $this;
    }

    /**
     * Get begin
     *
     * @return \DateTime 
     */
    public function getBegin()
    {
        return $this->begin;
    }

    /**
     * Set end
     *
     * @param \DateTime $end
     * @return Subtask
     */
    public function setEnd($end)
    {
        $this->end = $end;

        return $this;
    }

    /**
     * Get end
     *
     * @return \DateTime 
     */
    public function getEnd()
    {
        return $this->end;
    }

    /**
     * Set percent
     *
     * @param integer $percent
     * @return Subtask
     */
    public function setPercent($percent)
    {
        $this->percent = $percent;

        return $this;
    }

    /**
     * Get percent
     *
     * @return integer 
     */
    public function getPercent()
    {
        return $this->percent;
    }

    /**
     * Set final
     *
     * @param boolean $final
     * @return Subtask
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
     * Set Task
     *
     * @param \TaskBundle\Entity\Task $task
     * @return Subtask
     */
    public function setTask(\TaskBundle\Entity\Task $task = null)
    {
        $this->Task = $task;

        return $this;
    }

    /**
     * Get Task
     *
     * @return \TaskBundle\Entity\Task 
     */
    public function getTask()
    {
        return $this->Task;
    }

    /**
     * �������� ���� ��������� ��� �������
     * ��� �� ������ ���� ������ ���� �������� �������� �������
     *
     * @return bool
     */
    public function isValidDate()
    {
        $datetask=$this->Task->GetEndTask();
        return $this->end > $datetask ? false : true;
    }
}

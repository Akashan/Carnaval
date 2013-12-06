<?php

namespace Carnaval\WebsiteBundle\Entity;

class EventsByMonth
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTime
     */
    private $from;

    /**
     * @var \DateTime
     */
    private $to;

    /**
     * @var array
     */
    private $events;

    /**
     * Set name
     *
     * @param string $name
     * @return EventsByMonth
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set eventDate
     *
     * @param \DateTime $from
     * @return EventsByMonth
     */
    public function setFrom($fromDate)
    {
        $this->from = $fromDate;

        return $this;
    }

    /**
     * Get from
     *
     * @return \DateTime
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * Set eventDate
     *
     * @param \DateTime $to
     * @return EventsByMonth
     */
    public function setTo($toDate)
    {
        $this->from = $toDate;

        return $this;
    }

    /**
     * Get to
     *
     * @return \DateTime
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * Set keywords
     *
     * @param array $events
     * @return EventsByMonthr
     */
    public function setEvents($events)
    {
        $this->events = $events;

        return $this;
    }

    /**
     * Get events
     *
     * @return array
     */
    public function getEvents()
    {
        return $this->events;
    }

}
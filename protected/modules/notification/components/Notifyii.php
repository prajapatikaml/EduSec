<?php

/**
 * @author Simone Gentili <sensorario@gmail.com>
 */
class Notifyii extends CComponent
{
    private $expire;
    private $message;
    private $role;
    private $link;
    private $alert_after_date;
    private $alert_before_date;

    const ONE_DAY_AFTER = "+1 day";
    const ONE_WEEK_AFTER = "+1 week";
    const ONE_DAY_BEFORE = "-1 day";
    const ONE_WEEK_BEFORE = "-1 week";

    public function link($link = null)
    {
        $this->link = $link;
    }

    public function message($message = 'empty message')
    {
        $this->message = $message;
    }

    public function role($role = 'admin')
    {
        $this->role = $role;
    }

    public function expire(DateTime $expire)
    {
        $this->expire = $expire;
    }

    public function getExpirationDate()
    {
        return $this->expire;
    }

    public function getExpirationDateTimestamp()
    {
        return $this->expire
                        ->getTimestamp();
    }

    public function getExpirationDateTimestampFormatted($format = "d/m/Y")
    {
        $timestamp = $this->getExpirationDateTimestamp();
        return date($format, $timestamp);
    }

    public function from($start)
    {
        $valid = array(
            Notifyii::ONE_DAY_BEFORE,
            Notifyii::ONE_WEEK_BEFORE,
        );

        if (!in_array($start, $valid)) {
            throw new Exception;
        }

        $expire = clone $this->expire;
        $this->alert_after_date = $expire->modify($start);
    }

    public function to($end)
    {
        $valid = array(
            Notifyii::ONE_DAY_AFTER,
            Notifyii::ONE_WEEK_AFTER,
        );

        if (!in_array($end, $valid)) {
            throw new Exception;
        }

        $expire = clone $this->expire;
        $this->alert_before_date = $expire->modify($end);
    }

    public function __toString()
    {
        $at = $this->expire->format('d/m/Y');
        $daysLeft = $this->getDaysLeft();

        return "This notification will expire at $at. In $daysLeft days.";
    }

    private function getDaysLeft()
    {
        $now = new DateTime();
        $seconds = ($this->expire->getTimestamp() - $now->getTimestamp());
        $minutes = $seconds / 60;
        $hours = $minutes / 60;
        return ceil($hours / 24);
    }

    public function save()
    {
        $expire = $this->expire->getTimestamp();
        $after = $this->alert_after_date->getTimestamp();
        $before = $this->alert_before_date->getTimestamp();

        $notifyii = new ModelNotifyii();
        $notifyii->expire = date('Y-m-d', $expire);
        $notifyii->alert_after_date = date('Y-m-d', $after);
        $notifyii->alert_before_date = date('Y-m-d', $before);
        $notifyii->content = $this->message;
        $notifyii->role = $this->role;
        $notifyii->link = $this->link;
        $notifyii->save();
    }

}
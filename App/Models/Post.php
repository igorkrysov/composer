<?php

namespace App\Models;
/**
 * @Entity
 * @Table(name="posts")
 */
class Post {

    /**
     * @Id @Column(type="integer") @GeneratedValue
     */
    protected $id;

    /**
     * @Column(type="integer")
     */
    protected $user_id;

    /**
     * @Column(type="string")
     */
    protected $title;

    /**
     * @Column(type="string")
     */
    protected $text;

    /** @Column(type="datetime") */
    protected $created;

    /** @Column(type="string") */
    private $timezone;
 
    /**
      * @var bool
     */
    private $localized = false;
 
    /**
     * Many Posts have one user.
     * @ManyToOne(targetEntity="User", inversedBy="features")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $product;

    public function __construct(\DateTime $createDate) {
        $this->localized = true;
        $this->created = $createDate;
        $this->timezone = $createDate->getTimeZone()->getName();
    }
 
    public function getCreated() {
        if (!$this->localized) {
            $this->created->setTimeZone(new \DateTimeZone($this->timezone));
        }
         return $this->created;
    }
}
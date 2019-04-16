<?php

namespace App\Models;

use Doctrine\Common\Collections\ArrayCollection;
 
/**
 *
 * @Entity
 * @Table(name="users")
 */
class User {


    /**
     * @Id @Column(type="integer") @GeneratedValue
     * @var int
     */
    protected $id;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $name;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $email;
    /**
     * @Column(type="datetime")
     */
    protected $created;

    /**
     * @Column(type="string")
     */
    protected $timezone;

    /**
     * @var bool
     */
    private $localized = false;

    /**
     * One user has many posts. This is the inverse side
     * @OneToMany(targetEntity="Post", mappedBy="user")
     */
    protected $posts;

    /**
     * Many Users have many Lessons
     * @ManyToMany(targetEntity="Lesson")
     * @JoinTable(name="users_lessons",
     *              joinColumns={@JoinColumn(name="user_id", referencedColumnName="id")},
     *              inverseJoinColumns={@JoinColumn(name="lesson_id", referencedColumnName="id")}
     * )
     */
    private $lessons;

    public function __construct(\DateTime $createDate) {
        $this->localized = true;
        $this->created = $createDate;
        $this->timezone = $createDate->getTimeZone()->getName();
        $this->posts = new ArrayCollection();
        $this->lessons = new ArrayCollection();
    }

    public function getCreated() {
        if (!$this->localized) {
            $this->created->setTimeZone(new \DateTimeZone($this->timezone));
        }

        return $this->created;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }
    
    public function getPosts() {
        return $this->posts;
    }

    public function getLessons() {
        return $this->lessons;
    }
}

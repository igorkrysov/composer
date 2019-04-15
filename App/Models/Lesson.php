<?php

namespace App\Models;

/** 
 * @Entity
 * @Table(name="lessons")
 */
class Lesson {
    /**
     * @Id @Column(type="integer") @GeneratedValue
     */
    protected $id;

    /** @Column(type="string") */
    protected $name;
}
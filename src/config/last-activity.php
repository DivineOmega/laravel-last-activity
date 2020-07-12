<?php

return [

    // Field in which the last activity date time will be stored.
    'field' => 'last_activity',

    /**
     * The amount of seconds the field is considered stale and should update.
     * This prevents a write on every request, particularly useful with read replica databases.
     * Set to 0 to disable.
     */
    'grace_time' => 0,
];

<?php

return [
    'status' => [
        'merital'   => ['single', 'married','divorce','separated'],
        'event'     => ['inactive','active'],
        'employee'  => ['former', 'provession', 'confirm', 'resigned', 'terminate'],
        'attendance'=> ['early_leave', 'late_ccome','early_leave_late_come','present','leave','half_day','leave_without_pay','absent','sandwitch_leave'],
        'interview' => [
            'selected', 'rejected', 'on_hold', 'scheduled', 'resheduled',
            'approval_send', 'approved', 'not_approved',
            'offer_send', 'offer_accept', 'offer_rejected',
            'joining_scheduled', 'joining_resheduled', 'not_joined', 'complete'
        ]
    ],
    'week' => [
        'names' => ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday']
    ],
    'gender' => [
        'type'   => ['male', 'female', 'others']
    ],
    'interview' => [
        'round' => ['screeming','technical','final'],
        'mode'  => ['screeming','technical','final']
    ],
    'leave' => [
        'type' => ['privilege_leave', 'casual_leave', 'sick_leave', 'comp_off', 'uninform_leave','leave_without_pay','holiday','week_off'],
    ],
    'requisition'   => [
        'priority'  => ['high','medium','low'],
        'status'    => ['open','closed','on_hold','not_required','re_open']
    ],
    'payment_status' => ['pending', 'failed', 'success', 'refunded']
];
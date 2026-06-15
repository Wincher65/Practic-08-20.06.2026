<?php
 $data = [
    'category' => [
        'one' => [
            'priority' => '3',
            'views' => [
                'user_count' => 345,
                'bot_count' => 9392
            ]
        ],
        'two' => [
            'priority' => '1',
            'views' => [
                'user_count' => 123222,
                'bot_count' => 99
            ]
        ],
        'three' => [
            'priority' => '2',
            'views' => [
                'user_count' => 23,
                'bot_count' => 1
            ]
        ],

    ]
];

$bot_сount = array_column(array_column($data['category'], 'views'), 'bot_count');
$max = max($bot_сount);
$min = min($bot_сount);

$sorted = $data['category'];

$priorities = array_column($sorted, 'priority');

array_multisort($priorities, SORT_ASC, $sorted);

    $user_сount = [];
    $bot_count = [];
        foreach ($sorted as $item) {
            $user_сount[] = $item['views']['user_count'];
            $bot_сount[] = $item['views']['bot_count'];
        }
        
echo "Максимальный 'bot_count': " . $max . "\n";
echo "Минимальный 'bot_count': " . $min . "\n";
echo "Все значения 'user_count': " . implode(", ", $user_сount) . "\n";
echo "Все значения 'bot_count': " . implode(", ", $bot_сount) . "\n";
?>
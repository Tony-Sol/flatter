<?php

declare(strict_types=1);

namespace Flatter\Tests;

use Flatter\Flatter;

class WithEscapingOriginalKeyTest extends AbstractTest
{
    /**
     * {@inheritDoc}
     *
     * @return array<string, array<int, array<string, array<string, array<string, int>|string>|int|string>>>
     */
    public function provideFlatten(): array
    {
        return [
            'Flattened escaping "_"' => [
                [
                    'array' => [
                        'key'   => 'value',
                        'inner' => [
                            'key'            => 1,
                            'with_separator' => 2,
                        ],
                    ],
                ],
                [
                    'array_key'                   => 'value',
                    'array_inner_key'             => 1,
                    'array_inner_with\_separator' => 2,
                ],
            ],
        ];
    }

    /**
     * {@inheritDoc}
     *
     * @return array<string, array<int, array<string, array<string, array<string, int>|string>|int|string>>>
     */
    public function provideInflate(): array
    {
        return [
            'Inflated with escaping "_"' => [
                [
                    'array_key'                   => 'value',
                    'array_inner_key'             => 1,
                    'array_inner_with\_separator' => 2,
                ],
                [
                    'array' => [
                        'key'   => 'value',
                        'inner' => [
                            'key'            => 1,
                            'with_separator' => 2,
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * {@inheritDoc}
     *
     * @param array<string, mixed> $data Initial data.
     *
     * @return Flatter
     */
    protected function flatter(array $data): Flatter
    {
        return (new Flatter($data))->escapingSeparatorInKeys();
    }
}

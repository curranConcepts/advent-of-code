<?php

namespace Aoc\Tests\Unit;

use Aoc\Day05;
use PHPUnit\Framework\TestCase;

final class Day05Test extends TestCase
{
    public function testPart1ExampleInput(): void
    {
        $dayPuzzle = new Day05();
        $input = <<<TXT
seeds: 79 14 55 13

seed-to-soil map:
50 98 2
52 50 48

soil-to-fertilizer map:
0 15 37
37 52 2
39 0 15

fertilizer-to-water map:
49 53 8
0 11 42
42 0 7
57 7 4

water-to-light map:
88 18 7
18 25 70

light-to-temperature map:
45 77 23
81 45 19
68 64 13

temperature-to-humidity map:
0 69 1
1 0 69

humidity-to-location map:
60 56 37
56 93 4
TXT;
        $puzzle = $dayPuzzle->parsePuzzle($input);
        $this->assertSame(35, $dayPuzzle->solvePart1($puzzle));
    }

    public function testPart2ExampleInput(): void
    {
        $dayPuzzle = new Day05();
        $input = <<<TXT
seeds: 79 14 55 13

seed-to-soil map:
50 98 2
52 50 48

soil-to-fertilizer map:
0 15 37
37 52 2
39 0 15

fertilizer-to-water map:
49 53 8
0 11 42
42 0 7
57 7 4

water-to-light map:
88 18 7
18 25 70

light-to-temperature map:
45 77 23
81 45 19
68 64 13

temperature-to-humidity map:
0 69 1
1 0 69

humidity-to-location map:
60 56 37
56 93 4
TXT;

        $puzzle = $dayPuzzle->parsePuzzle($input);
        $this->assertSame(46, $dayPuzzle->solvePart2($puzzle));
    }

    public function testParsePuzzle(): void
    {
        $dayPuzzle = new Day05();
        $input = <<<TXT
seeds: 79 14 55 13

seed-to-soil map:
50 98 2
52 50 48

soil-to-fertilizer map:
0 15 37
37 52 2
39 0 15

fertilizer-to-water map:
49 53 8
0 11 42
42 0 7
57 7 4

water-to-light map:
88 18 7
18 25 70

light-to-temperature map:
45 77 23
81 45 19
68 64 13

temperature-to-humidity map:
0 69 1
1 0 69

humidity-to-location map:
60 56 37
56 93 4
TXT;
        $puzzle = $dayPuzzle->parsePuzzle($input);
        $this->assertSame([
            'seeds' => [79, 14, 55, 13],
            'maps' => [
                [
                    ['destination' => 50, 'source' => 98, 'length' => 2],
                    ['destination' => 52, 'source' => 50, 'length' => 48],
                ],
                [
                    ['destination' => 0, 'source' => 15, 'length' => 37],
                    ['destination' => 37, 'source' => 52, 'length' => 2],
                    ['destination' => 39, 'source' => 0, 'length' => 15],
                ],
                [
                    ['destination' => 49, 'source' => 53, 'length' => 8],
                    ['destination' => 0, 'source' => 11, 'length' => 42],
                    ['destination' => 42, 'source' => 0, 'length' => 7],
                    ['destination' => 57, 'source' => 7, 'length' => 4],
                ],
                [
                    ['destination' => 88, 'source' => 18, 'length' => 7],
                    ['destination' => 18, 'source' => 25, 'length' => 70],
                ],
                [
                    ['destination' => 45, 'source' => 77, 'length' => 23],
                    ['destination' => 81, 'source' => 45, 'length' => 19],
                    ['destination' => 68, 'source' => 64, 'length' => 13],
                ],
                [
                    ['destination' => 0, 'source' => 69, 'length' => 1],
                    ['destination' => 1, 'source' => 0, 'length' => 69],
                ],
                [
                    ['destination' => 60, 'source' => 56, 'length' => 37],
                    ['destination' => 56, 'source' => 93, 'length' => 4],
                ],
            ]
        ], $puzzle);
    }

    /**
     * @dataProvider providerFindMappedValue
     */
    public function testFindMappedValue(int $number, array $map, int $expectedValue): void
    {
        $dayPuzzle = new Day05();
        $this->assertSame($expectedValue, $dayPuzzle->findMappedValue($number, $map));
    }

    public static function providerFindMappedValue(): array
    {
        $dayPuzzle = new Day05();
        $map = $dayPuzzle->parseMap("seed-to-soil map:\n50 98 2\n52 50 48");
        return [
            [79, $map, 81],
            [14, $map, 14],
            [55, $map, 57],
            [13, $map, 13],
        ];
    }

    /**
     * @dataProvider providerFindReverseMappedValue
     */
    public function testFindReverseMappedValue(int $number, array $map, int $expectedValue): void
    {
        $dayPuzzle = new Day05();
        $this->assertSame($expectedValue, $dayPuzzle->findReverseMappedValue($number, $map));
    }

    public static function providerFindReverseMappedValue(): array
    {
        $dayPuzzle = new Day05();
        $map = $dayPuzzle->parseMap("seed-to-soil map:\n50 98 2\n52 50 48");
        return [
            [81, $map, 79],
            [14, $map, 14],
            [57, $map, 55],
            [13, $map, 13],
        ];
    }
}





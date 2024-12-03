<?php
/*
--- Part Two ---
The engineers are surprised by the low number of safe reports until they realize they forgot to tell you about the Problem Dampener.

The Problem Dampener is a reactor-mounted module that lets the reactor safety systems tolerate a single bad level in what would otherwise be a safe report. It's like the bad level never happened!

Now, the same rules apply as before, except if removing a single level from an unsafe report would make it safe, the report instead counts as safe.

More of the above example's reports are now safe:

7 6 4 2 1: Safe without removing any level.
1 2 7 8 9: Unsafe regardless of which level is removed.
9 7 6 2 1: Unsafe regardless of which level is removed.
1 3 2 4 5: Safe by removing the second level, 3.
8 6 4 4 1: Safe by removing the third level, 4.
1 3 6 7 9: Safe without removing any level.
Thanks to the Problem Dampener, 4 reports are actually safe!

Update your analysis by handling situations where the Problem Dampener can remove a single level from unsafe reports. How many reports are now safe?
*/

$inputFileName = 'input.txt';
$reports = getInputFromFile($inputFileName);
$validReports = [];
$validReportsWithDampener = [];

foreach ($reports as $report) {
    if (validateReport($report)) {
        $validReports[] = $report;
    }

    if (validateReportWithDampener($report)) {
        $validReportsWithDampener[] = $report;
    }
}

echo sprintf('Valid Reports with Dampener (Part 2): %s', count($validReportsWithDampener));

function getInputFromFile(string $fileName): array
{
    if (!file_exists($fileName)) {
        throw new Exception(sprintf('No input file with name: %s', $fileName));
    }

    $input = file($fileName, FILE_IGNORE_NEW_LINES);

    if (empty($input) || !is_array($input)) {
        throw new Exception(sprintf('Empty input file with name: %s', $fileName));
    }

    return array_map(fn(string $report) => explode(' ', $report), $input);
}

function validateReportWithDampener(array $report): bool
{
    return array_any(
        $report,
        fn ($value, $index) => validateReport(arrayWithoutIndex($report, $index))
    );
}

function arrayWithoutIndex(array $input, int $index): array
{
    unset($input[$index]);

    return array_values($input);
}

function validateReport(array $report): bool
{
    $isIncreasing = areLevelsIncreasing($report);
    $isDecreasing = areLevelsDecreasing($report);

    if ($isIncreasing === $isDecreasing) {
        return false;
    }

    $previousLevel = null;

    foreach ($report as $level) {
        if (is_null($previousLevel)) {
            $previousLevel = $level;

            continue;
        }

        $validLevel = validateLevel($level, $previousLevel, $isIncreasing, $isDecreasing);

        if (!$validLevel) {
            return false;
        }

        $previousLevel = $level;
    }

    return true;
}

function areLevelsIncreasing(array $report): bool
{
    return sortReport($report) === $report;
}

function areLevelsDecreasing(array $report): bool
{
    return sortReport($report) === array_reverse($report);
}

function sortReport(array $report): array
{
    sort($report, SORT_NUMERIC);

    return $report;
}

function validateLevel(int $level, int $previousLevel, bool $isIncreasing, bool $isDecreasing): bool
{
    if (abs($level - $previousLevel) > 3 || $level === $previousLevel) {
        return false;
    }

    if ($level > $previousLevel && $isDecreasing) {
        return false;
    }

    if ($level < $previousLevel && $isIncreasing) {
        return false;
    }

    return true;
}

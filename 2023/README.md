<p align="center">
  <img src="https://i.postimg.cc/XYCG1k0L/tis-the-season.png" width="75%">
</p>
<hr />

## Solutions

| Day | Name                            | Code                             | Benchmark †                                                                                                                                                                                                                                 |
|-----|---------------------------------|----------------------------------|--------------|
| 01  | Trebuchet?!                     | [src/Day01.php](./src/Day01.php) | `0.001971s`  |
| 02  | Cube Conundrum                  | [src/Day02.php](./src/Day02.php) | `0.000715s`  |
| 03  | Gear Ratios                     | [src/Day03.php](./src/Day03.php) | `0.001589s`  |
| 04  | Scratchcards                    | [src/Day04.php](./src/Day04.php) | `0.001010s`  |
| 05  | If You Give A Seed A Fertilizer | [src/Day05.php](./src/Day05.php) | `0.001833s`  |
| 06  | Wait For It                     | [src/Day06.php](./src/Day06.php) | `0.000076s`  |
| 07  | Camel Cards                     | [src/Day07.php](./src/Day07.php) | `0.239075s`  |
| 08  | Haunted Wasteland               | [src/Day08.php](./src/Day08.php) | `0.018875s`  |
| 09  | Mirage Maintenance              | [src/Day09.php](./src/Day09.php) | `0.006341s`  |
| 10  | Pipe Maze                       | [src/Day10.php](./src/Day10.php) | `0.008622s`  |
| 11  | Cosmic Expansion                | [src/Day11.php](./src/Day11.php) | `0.134003s`  |
| 12  | Hot Springs                     | [src/Day12.php](./src/Day12.php) | ``           |
| 13  | Point of Incidence              | [src/Day13.php](./src/Day13.php) | `0.015861s`  |
| 14  | Parabolic Reflector Dish        | [src/Day14.php](./src/Day14.php) | `0.996860s`  |
| 15  | Lens Library                    |                                  | Not Started  |
| 16  | The Floor Will Be Lava          | [src/Day16.php](./src/Day16.php) | `5.479180s`  |

† Benchmark durations are an average of 10 samples

## How to run

The puzzles can be run by either installing PHP and [Composer](https://getcomposer.org) directly on your machine, or using [Docker](https://www.docker.com/get-started/). Assuming Docker is installed, run `make shell` to run an interactive shell with Composer installed:

Before running the code, the dependencies must be installed by running:

```shell
composer install
```

All puzzles can be executed by running:

```shell
php src/main.php
```

Individual puzzles can be executed by adding the day-number:

```shell
php src/main.php 01
```

The solutions can be benchmarked by adding the flag `-b`:

```shell
php src/main.php 01 -b
```

## How to develop

As mentioned above, the code for each puzzle can be run individually. But this project has additional tools to help with development.

### Tests

Test-driven-development using unit tests can help with solving a puzzle by ensuring individual functions work as expected. Tests can be added in `tests/Unit/*` and run using [PHPUnit](http://phpunit.de). The flags `--testdox` and `--colors` can help make the output more legible:

```shell
vendor/bin/phpunit tests/Unit/Day01Test.php --testdox --colors
```

This can be run quickly for all tests from the Makefile:

```shell
make tests
```

### Linting & Static Analysis

Following code standards can help make the code more legible and running static analysis tools can spot issues in the code. This project comes with PHP [CodeSniffer](https://github.com/squizlabs/PHP_CodeSniffer) and [Psalm](https://psalm.dev):

```shell
vendor/bin/phpcs -p --standard=PSR12 src/ tests/
vendor/bin/psalm --show-info=true
```

These can be run quickly from the Makefile:

```shell
make lint
```


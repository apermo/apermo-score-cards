# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased]

### Changed

- Extracted plugin from `chrdm.de` monolith into its own repository.
- Adopted the `apermo/template-wordpress` scaffold: PSR-4 autoloading,
  `apermo/apermo-coding-standards`, PHPStan + WordPress rules, husky +
  lint-staged + commitlint, full CI workflow set, DDEV via
  `apermo/ddev-orchestrate`.
- Bumped composer PHP requirement to `>=8.3`.

## [1.0.0] - 2026-05-25

### Added

- Gutenberg blocks for darts, wizard, phase 10, pool billiard, and
  evening summary score cards with automatic scoring calculations.
- Custom REST API endpoints for game and player management.
- Frontend score submission with React-based forms.
- Custom capabilities for game management.
- Player management with multi-user support.

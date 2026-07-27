
# ADR-005 --- Coding Standards

## Status

Accepted

------------------------------------------------------------------------

## Decision

The framework follows the official WordPress Coding Standards and
reinforces them through project tooling as the framework matures.

## Why

Consistency is more valuable than individual preference.

Coding standards improve:

-   Readability
-   Collaboration
-   Maintainability
-   Security
-   Accessibility

The goal is not perfect formatting.

The goal is reducing cognitive load.

## Enforcement Strategy

### Stage 1

-   EditorConfig
-   VS Code recommendations
-   Manual review

### Stage 2

-   PHP_CodeSniffer
-   WordPress Coding Standards
-   Composer

### Stage 3

-   GitHub Actions
-   Automated linting
-   Continuous quality checks

## Tradeoffs

### Pros

-   Predictable codebase
-   Easier onboarding
-   Fewer regressions
-   Higher long-term quality

### Cons

-   Additional tooling
-   Slight learning curve
-   Occasional formatting friction

------------------------------------------------------------------------

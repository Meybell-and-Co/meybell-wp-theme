# ADR-009 --- Generated Artifacts are Disposable

## Status

Accepted

------------------------------------------------------------------------

## Decision

Generated files are considered build artifacts.

They may be regenerated at any time from their canonical source files.

The framework should never require developers to manually edit generated
output.

------------------------------------------------------------------------

## Why

Generated artifacts exist to satisfy the requirements of downstream
platforms.

They are products of the build process---not sources of architectural
truth.

Treating generated files as disposable prevents configuration drift and
reinforces the framework's single-source-of-truth philosophy.

------------------------------------------------------------------------

## Examples

### Source Files

-   design-tokens.json
-   config/theme.base.json

### Generated Files

-   theme.json

Future generated artifacts may include:

-   CSS variables
-   Tailwind configuration
-   Figma tokens
-   Style Dictionary output

------------------------------------------------------------------------

## Tradeoffs

### Pros

-   Eliminates duplicated maintenance
-   Consistent platform output
-   Easier automation
-   Predictable builds

### Cons

-   Requires developers to learn the build process
-   Generated files may appear unfamiliar to new contributors

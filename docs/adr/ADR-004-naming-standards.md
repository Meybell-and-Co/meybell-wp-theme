
# ADR-004 --- Naming Standards

## Status

Accepted

------------------------------------------------------------------------

## Decision

The framework adopts a hybrid naming strategy.

PHP and WordPress identifiers receive the `mnco` prefix.

CSS components use semantic BEM naming.

JavaScript follows modern camelCase conventions.

## Why

Different languages have different conventions.

Attempting to force one universal naming pattern creates awkward code.

Instead, the framework follows each language's community expectations
while maintaining clear Meybell ownership.

## Examples

### PHP

mnco_theme_setup()

### CSS

.field-note-card

.field-note-card\_\_title

.field-note-card--featured

### JavaScript

toggleNavigation()

window.mncoDemo

## Tradeoffs

### Pros

-   Familiar to experienced developers
-   Prevents namespace collisions
-   Easy to read

### Cons

-   Multiple naming styles must be understood
-   Requires discipline and documentation

------------------------------------------------------------------------

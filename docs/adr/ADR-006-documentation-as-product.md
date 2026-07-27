
# ADR-006 --- Documentation as a Product

## Status

Accepted

------------------------------------------------------------------------

## Decision

Documentation is considered a first-class deliverable rather than an
afterthought.

Every repository should explain both:

-   How the system works.
-   Why the system was designed that way.

## Why

Good documentation compounds.

Future maintainers should inherit reasoning, not mysteries.

The framework should be understandable without relying on institutional
memory.

## Documentation Responsibilities

### README.md

"How do I use this?"

### ARCHITECTURE.md

"Why is it built this way?"

### Inline comments

"Why is this code written this way?"

### Git history

"When did this change?"

## Tradeoffs

### Pros

-   Easier onboarding
-   Better maintenance
-   Faster future decisions
-   Less repeated investigation

### Cons

-   Requires discipline to keep current
-   Slight upfront time investment

------------------------------------------------------------------------

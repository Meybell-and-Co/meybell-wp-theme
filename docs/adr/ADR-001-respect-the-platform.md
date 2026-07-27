# ADR-001 — Respect the Platform

## Status

Accepted

---

## Decision

The Meybell Framework will prefer native APIs, conventions, extension points, and documented architecture before introducing custom implementations.

When a platform provides a stable, well-supported solution, the framework should extend it rather than replace or circumvent it.

Custom code should solve problems the platform does not—not recreate functionality that already exists.

---

## Why

Every mature platform develops patterns that encourage compatibility, maintainability, and interoperability.

Whether the framework is running on WordPress, Statamic, Astro, Laravel, or another system, respecting those conventions reduces friction and allows the platform to continue doing what it does well.

Working with the platform instead of against it generally provides:

- Better compatibility
- Easier upgrades
- Lower maintenance
- Improved interoperability
- A smaller long-term codebase

The framework should add value through thoughtful extensions—not by competing with the underlying platform.

---

## Examples

### Good

- Registering functionality through documented APIs.
- Using native configuration systems.
- Extending existing editor capabilities.
- Following established project conventions.

### Avoid

- Replacing native systems without clear benefit.
- Duplicating existing platform features.
- Ignoring documented extension points.
- Reinventing stable functionality solely for stylistic preference.

---

## Alternatives Considered

### Build Everything Custom

Maximum flexibility.

Maximum maintenance burden.

Requires rebuilding solutions that mature platforms already provide.

### Platform-First (Selected)

Use the platform's strengths as the foundation.

Introduce custom code only when it delivers meaningful value beyond the platform's native capabilities.

---

## Tradeoffs

### Pros

- Easier upgrades
- Better ecosystem compatibility
- Less duplicated functionality
- Lower maintenance costs
- More predictable developer experience

### Cons

- Occasionally constrained by platform conventions
- Requires learning the platform before extending it
- Some architectural preferences may need to adapt to platform limitations

---

## Future Direction

As the Meybell Framework expands to additional platforms, this principle should remain unchanged.

Only the implementation details should differ.

The goal is not to make every platform behave like WordPress.

The goal is to become a good citizen of whichever platform the framework is built upon.

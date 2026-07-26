# Meybell Framework

"Good architecture should make the right thing easier than the wrong thing."

## Purpose

The Meybell Framework is a WordPress-first starter framework for rapidly building client websites that are maintainable, accessible, secure, and pleasant to work on.

It is not intended to replace WordPress.

It exists to organize and extend WordPress using its documented APIs and conventions.

---

# Philosophy

## Prefer Native

Whenever WordPress provides a stable, documented solution, prefer it over custom code.

Extend the platform.

Do not compete with it.

---

## Presentation and Functionality are Separate

Themes control presentation.

Plugins control functionality.

Anything that should survive a theme change belongs in a plugin.

---

## One Source of Truth

Every piece of information should have one authoritative owner.

Examples:

- Colors → theme.json
- Typography → theme.json
- Theme setup → setup.php
- Asset loading → enqueue.php
- Navigation → navigation.php

Avoid duplicating configuration.

---

## Clear Before Clever

Code should be obvious before it is impressive.

Future readability is more valuable than present cleverness.

---

## Build Small Pieces

Large systems should emerge from small, understandable modules.

Small files.

Small functions.

Small commits.

---

## Progressive Enhancement

Content should remain useful even when JavaScript is unavailable.

Animation should enhance understanding, not create it.

---

## Accessibility is a Feature

Accessibility is considered part of the design process, not an afterthought.

Keyboard users are first-class users.

Reduced-motion preferences are respected.

Semantic HTML is preferred over custom widgets.

---

## Security by Default

Validate.

Sanitize.

Authorize.

Escape.

These are not optional.

---

## Documentation Matters

The repository should explain both:

How it works.

Why it works.

Future maintainers should not need archaeology.

---

# Repository Structure

assets/
Visual assets.

inc/
Theme implementation.

parts/
Reusable template pieces.

templates/
Page templates.

README.md
How to install and use.

ARCHITECTURE.md
Why the framework is built this way.
# Architecture Decision Records (ADRs)

Architecture Decision Records document significant technical decisions made during the development of the Meybell Framework.

They serve two purposes:

1. Preserve the reasoning behind important decisions.
2. Prevent future developers (including Future Mark) from solving problems that have already been thoughtfully considered.

An ADR is not permanent doctrine. If a better solution emerges, a new ADR should supersede the old one while preserving the historical context.

---

# ADR-001 — WordPress-First Development

**Status:** Accepted

## Decision

The Meybell Framework will prefer native WordPress APIs, conventions, hooks, and documented architecture before introducing custom implementations.

Whenever WordPress provides a stable, supported solution, we will build on top of it rather than around it.

## Why

WordPress is not simply a CMS—it is the platform our framework is built upon.

Working with the platform instead of fighting it provides:

- Better compatibility
- Easier upgrades
- Lower maintenance
- Improved plugin interoperability
- A smaller long-term codebase

Custom code should exist because it provides unique value, not because native WordPress was overlooked.

## Alternatives Considered

### Build everything custom

Maximum flexibility.

Maximum maintenance burden.

### Hybrid (selected)

Use WordPress wherever practical.

Customize only where necessary.

## Tradeoffs

Pros

- Easier upgrades
- Less custom code
- Better ecosystem compatibility
- Lower maintenance cost

Cons

- Occasionally constrained by WordPress conventions
- May require learning WordPress APIs instead of inventing simpler shortcuts

---

# ADR-002 — Separation of Presentation and Functionality

**Status:** Accepted

## Decision

The theme is responsible for presentation.

Plugins are responsible for functionality.

Any feature that should survive a theme change belongs in a plugin.

## Why

Presentation changes over time.

Business functionality often does not.

Separating these concerns allows Meybell tools to be reused across projects and protects client investments when visual redesigns occur.

## Examples

Theme

- Layout
- Typography
- Colors
- Templates
- Component styling

Plugin

- Calculators
- Dashboards
- Data storage
- Business rules
- Forms
- Integrations

## Tradeoffs

Pros

- Highly reusable
- Easier maintenance
- Cleaner responsibilities
- Safer redesigns

Cons

- Slightly more upfront architecture
- Requires coordination between theme and plugin

---

# ADR-003 — Design Token Strategy

**Status:** Accepted

## Decision

theme.json is the authoritative source for shared design tokens.

CSS creates semantic aliases and implements component styling.

## Why

WordPress already exposes design tokens to both the editor and the front-end.

Using the native system keeps the editor synchronized with the website while allowing components to use meaningful semantic variables.

Example

WordPress owns:

Gold

Charcoal

Cream

CSS owns:

Accent

Surface

Text

Border

## Tradeoffs

Pros

- Single source of truth
- Better editor integration
- Easier theming
- Cleaner components

Cons

- Requires learning WordPress token conventions
- Variable names are longer than custom CSS variables

---

# ADR-004 — Naming Standards

**Status:** Accepted

## Decision

The framework adopts a hybrid naming strategy.

PHP and WordPress identifiers receive the `mnco` prefix.

CSS components use semantic BEM naming.

JavaScript follows modern camelCase conventions.

## Why

Different languages have different conventions.

Attempting to force one universal naming pattern creates awkward code.

Instead, the framework follows each language's community expectations while maintaining clear Meybell ownership.

## Examples

PHP

mnco_theme_setup()

CSS

.field-note-card

.field-note-card__title

.field-note-card--featured

JavaScript

toggleNavigation()

window.mncoDemo

## Tradeoffs

Pros

- Familiar to experienced developers
- Prevents namespace collisions
- Easy to read

Cons

- Multiple naming styles must be understood
- Requires discipline and documentation

---

# ADR-005 — Coding Standards

**Status:** Accepted

## Decision

The framework follows the official WordPress Coding Standards and reinforces them through project tooling as the framework matures.

## Why

Consistency is more valuable than individual preference.

Coding standards improve:

- Readability
- Collaboration
- Maintainability
- Security
- Accessibility

The goal is not perfect formatting.

The goal is reducing cognitive load.

## Enforcement Strategy

Stage 1

- EditorConfig
- VS Code recommendations
- Manual review

Stage 2

- PHP_CodeSniffer
- WordPress Coding Standards
- Composer

Stage 3

- GitHub Actions
- Automated linting
- Continuous quality checks

## Tradeoffs

Pros

- Predictable codebase
- Easier onboarding
- Fewer regressions
- Higher long-term quality

Cons

- Additional tooling
- Slight learning curve
- Occasional formatting friction

---

# ADR-006 — Documentation as a Product

**Status:** Accepted

## Decision

Documentation is considered a first-class deliverable rather than an afterthought.

Every repository should explain both:

- How the system works.
- Why the system was designed that way.

## Why

Good documentation compounds.

Future maintainers should inherit reasoning, not mysteries.

The framework should be understandable without relying on institutional memory.

## Documentation Philosophy

README.md answers:

"How do I use this?"

ARCHITECTURE.md answers:

"Why is it built this way?"

Inline comments answer:

"Why is this code written this way?"

Git history answers:

"When did this change?"

## Tradeoffs

Pros

- Easier onboarding
- Better maintenance
- Faster future decisions
- Less repeated investigation

Cons

- Requires discipline to keep current
- Slight upfront time investment

# The Meybell Framework

## First Edition

------------------------------------------------------------------------

*Practical guidance for building durable digital systems.*

> "Good architecture should make the right thing easier than the wrong
> thing."

The purpose of this document is not to prescribe every implementation
detail.

It exists to preserve the reasoning behind the Meybell Framework so
future decisions remain consistent even as technologies change.

When implementation and philosophy disagree, revisit the implementation
first. Revise the philosophy only when a better principle has emerged.

------------------------------------------------------------------------

## Purpose

The Meybell Framework is a WordPress-first, design-system-driven starter
framework for building maintainable, accessible, secure, and
understandable digital experiences.

It is not intended to replace WordPress.

It exists to organize and extend platforms using documented APIs,
conventions, and a platform-independent design language.

------------------------------------------------------------------------

## Contents

-   Guiding Principles
-   Repository Structure
-   Generated Artifacts
-   Architecture Decision Records

------------------------------------------------------------------------

# Guiding Principles

## Respect the Platform

Build with the platform before building around it.

## Presentation and Functionality are Separate

Themes present.

Plugins provide functionality.

## One Source of Truth

Every piece of information has one authoritative owner.

Generated artifacts never become authoritative sources.

## Clear Before Clever

Optimize for comprehension before optimization.

## Build Small Pieces

Small files. Small functions. Small commits.

## Progressive Enhancement

Content should remain useful without JavaScript.

## Accessibility is a Feature

Accessibility is part of design---not an afterthought.

## Security by Default

Validate. Sanitize. Authorize. Escape.

## Documentation Matters

Every significant decision deserves an explanation.

## Systems Before Solutions

Build the smallest system that makes tomorrow's work easier.

## Intentional Complexity

Complexity is acceptable only when it creates lasting value.

## Optimize for Ownership

Build systems organizations can confidently own for years.

## Human-Centered Engineering

Optimize for human understanding before machine cleverness whenever
practical.

------------------------------------------------------------------------

# Repository Structure

`assets/`
:   Visual assets.

`config/`
:   Platform-specific configuration.

`docs/`
:   Framework documentation.

`inc/`
:   Theme implementation.

`scripts/`
:   Build and verification tooling.

`template-parts/`
:   Reusable templates.

`templates/`
:   Page templates.

`design-tokens.json`
:   Canonical design language.

`theme.json`
:   Generated WordPress implementation.

------------------------------------------------------------------------

# Generated Artifacts

## Source Files

-   design-tokens.json
-   config/theme.base.json

## Generated Files

-   theme.json

Generated files are products of the build process and should be
regenerated rather than edited manually.

------------------------------------------------------------------------

# Architecture Decision Records

Architecture Decision Records (ADRs) capture significant technical
decisions and, more importantly, the reasoning behind them.

Guiding Principles explain **how we think**.

ADRs explain **why we made a particular decision**.

Each ADR should generally follow this structure:

-   Status
-   Decision
-   Why
-   Alternatives Considered (optional)
-   Responsibilities (optional)
-   Examples (optional)
-   Tradeoffs
-   Future Direction (optional)

------------------------------------------------------------------------

## ADR Index

-   ADR-001 --- WordPress-First Development
-   ADR-002 --- Separation of Presentation and Functionality
-   ADR-003 --- Design Token Pipeline
-   ADR-004 --- Naming Standards
-   ADR-005 --- Coding Standards
-   ADR-006 --- Documentation as a Product
-   ADR-007 --- Design Systems Before Pages
-   ADR-008 --- Editor Experience is Part of the Product
-   ADR-009 --- Generated Artifacts are Disposable

------------------------------------------------------------------------

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

# ADR-003 — Design Token Pipeline

**Status:** Accepted

---

## Decision

design-tokens.json is the canonical source of Meybell's platform-independent design language.

Platform-specific artifacts (such as WordPress's theme.json) are generated from these tokens through build scripts rather than maintained manually.

Each platform is responsible for implementing the design language—not defining it.

---

## Why

The Meybell Framework is intended to outlive any single platform.

Today it targets WordPress.

Tomorrow it may target:

- Statamic
- Astro
- Tailwind
- CSS Variables
- Figma
- Native applications
- Design documentation

If every platform maintains its own copy of colors, typography, spacing, or layout values, they will inevitably drift over time.

By establishing one canonical vocabulary, every downstream implementation remains synchronized.

---

## Architecture

                    DESIGN LANGUAGE
                  design-tokens.json
                           │
                           ▼
                 Build / Translation Layer
                           │
          ┌────────────────┼────────────────┐
          ▼                ▼                ▼
      theme.json      CSS Variables     Figma Tokens
          ▼
      WordPress

---

## Responsibilities

### design-tokens.json

Owns:

- Colors
- Typography
- Spacing
- Layout widths
- Shape
- Motion
- Shadow values
- Semantic roles

---

### config/theme.base.json

Owns:

- WordPress behavior
- Editor policy
- Feature flags
- Native settings
- Platform conventions

---

### theme.json

Generated artifact.

Never edited manually.

---

### Build Scripts

Responsible for translating platform-independent tokens into platform-specific formats.

---

## Tradeoffs

### Pros

- True single source of truth
- Platform independence
- No duplicated design values
- Easier framework expansion
- Automatic synchronization

### Cons

- Requires a build step
- Slightly more initial architecture
- Contributors must understand generated files

---

## Future Direction

Additional platform adapters may eventually generate:

- CSS Custom Properties
- Tailwind configuration
- Figma Design Tokens
- Design documentation
- Other framework-specific assets

The design language should remain stable even as implementation targets evolve.

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

---

# ADR-007 — Design Systems Before Pages

**Status:** Accepted

## Decision

The Meybell Framework will prioritize building reusable design components before assembling complete pages.

Pages should be composed from a shared library of components rather than built as unique, one-off layouts whenever practical.

## Why

Pages are temporary.

Components become the visual vocabulary of the framework.

By investing in a reusable component library first, every new page benefits from improvements made to those components. This approach encourages consistency, reduces duplicated effort, and allows the design system to evolve organically over time.

The goal is not to make every page identical, but to ensure they are assembled from familiar, well-understood building blocks.

## Documentation Philosophy

When creating a new page or feature, ask these questions in order:

1. Can an existing component communicate this idea?
2. If not, is this a variation of an existing component?
3. Only if neither is true should a new component be created.

New components should solve recurring problems rather than one-time design requests.

## Examples

Components

- Buttons
- Cards
- Heroes
- Callouts
- Timelines
- Statistics
- Quotes
- Field Notes
- Continuous Thread
- Spotlight
- Bridge
- Window
- Shelf

Pages

- Home
- About
- Services
- Contact
- Case Study
- Blog Post

Pages should be assembled from components whenever practical.

## Tradeoffs

Pros

- Consistent visual language
- Faster page construction
- Reduced duplicated code
- Easier long-term maintenance
- Stronger design system

Cons

- Requires additional planning before building pages
- Some unique layouts may require creating new components
- Designers must think in systems rather than individual pages
# ADR-008 — Editor Experience is Part of the Product

## Status

Accepted

---

## Decision

The Block Editor is considered a first-class user interface of the Meybell Framework.

The editing experience shall receive the same level of intentional design, usability, accessibility, and documentation as the public-facing website.

Features, design tokens, and reusable components should be implemented in ways that create consistency between content creation and content presentation.

When a choice exists between making development easier and making content management clearer, the framework should favor the long-term experience of the content editor whenever reasonably practical.

---

## Why

A website is not finished when it is launched.

It becomes a tool that another person must use, often for years.

Many organizations spend dozens or hundreds of hours maintaining their websites after launch. Editors should not need to mentally translate between "what I see while editing" and "what visitors actually see."

A confusing editing experience leads to:

- inconsistent branding
- accidental design drift
- unnecessary training
- slower content updates
- reduced confidence
- abandoned CMS features

Conversely, an editor that mirrors the published experience allows content creators to work with confidence and consistency.

The framework therefore considers editor experience to be part of the product—not merely a development convenience.

---

## Documentation Philosophy

Documentation should describe editor-facing decisions alongside developer-facing decisions.

When introducing a new feature or component, documentation should answer two questions:

> **How does this improve the experience for the visitor?**

and

> **How does this improve the experience for the person maintaining the website?**

If documentation only addresses developers, it is incomplete.

If a design decision intentionally changes the editor experience, that rationale should be documented.

The goal is not simply to make websites easier to build.

The goal is to make websites easier to own.

---

## Examples

### Good

- Custom color palettes appear identically within the editor and on the live website.
- Typography shown while editing closely resembles the published page.
- Buttons inserted through Gutenberg automatically inherit framework spacing, border radius, and typography.
- Reusable blocks provide meaningful names and descriptions rather than technical jargon.

Example:

```text
❌ CTA_Component_01

✅ Call to Action
Encourage visitors to take the next step.

---

# ADR-009 — Generated Artifacts are Disposable

**Status:** Accepted

---

## Decision

Generated files are considered build artifacts.

They may be regenerated at any time from their canonical source files.

The framework should never require developers to manually edit generated output.

---

## Why

Generated artifacts exist to satisfy the requirements of downstream platforms.

They are products of the build process—not sources of architectural truth.

Treating generated files as disposable prevents configuration drift and reinforces the framework's single-source-of-truth philosophy.

---

## Examples

Source Files

- design-tokens.json
- config/theme.base.json

Generated Files

- theme.json

Future generated artifacts may include:

- CSS variables
- Tailwind configuration
- Figma tokens
- Style Dictionary output

---

## Tradeoffs

### Pros

- Eliminates duplicated maintenance
- Consistent platform output
- Easier automation
- Predictable builds

### Cons

- Requires developers to learn the build process
- Generated files may appear unfamiliar to new contributors

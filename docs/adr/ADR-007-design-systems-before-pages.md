
# ADR-007 --- Design Systems Before Pages

## Status

Accepted

------------------------------------------------------------------------

## Decision

The Meybell Framework will prioritize building reusable design
components before assembling complete pages.

Pages should be composed from a shared library of components rather than
built as unique, one-off layouts whenever practical.

## Why

Pages are temporary.

Components become the visual vocabulary of the framework.

By investing in a reusable component library first, every new page
benefits from improvements made to those components. This approach
encourages consistency, reduces duplicated effort, and allows the design
system to evolve organically over time.

The goal is not to make every page identical, but to ensure they are
assembled from familiar, well-understood building blocks.

## Documentation Responsibilities

When creating a new page or feature, ask these questions in order:

1.  Can an existing component communicate this idea?
2.  If not, is this a variation of an existing component?
3.  Only if neither is true should a new component be created.

New components should solve recurring problems rather than one-time
design requests.

## Examples

### Components

-   Buttons
-   Cards
-   Heroes
-   Callouts
-   Timelines
-   Statistics
-   Quotes
-   Field Notes
-   Continuous Thread
-   Spotlight
-   Bridge
-   Window
-   Shelf

### Pages

-   Home
-   About
-   Services
-   Contact
-   Case Study
-   Blog Post

Pages should be assembled from components whenever practical.

## Tradeoffs

### Pros

-   Consistent visual language
-   Faster page construction
-   Reduced duplicated code
-   Easier long-term maintenance
-   Stronger design system

### Cons

-   Requires additional planning before building pages
-   Some unique layouts may require creating new components
-   Designers must think in systems rather than individual pages \#
    ADR-008 --- Editor Experience is Part of the Product

## Status

Accepted

------------------------------------------------------------------------

## Decision

The Block Editor is considered a first-class user interface of the
Meybell Framework.

The editing experience shall receive the same level of intentional
design, usability, accessibility, and documentation as the public-facing
website.

Features, design tokens, and reusable components should be implemented
in ways that create consistency between content creation and content
presentation.

When a choice exists between making development easier and making
content management clearer, the framework should favor the long-term
experience of the content editor whenever reasonably practical.

------------------------------------------------------------------------

## Why

A website is not finished when it is launched.

It becomes a tool that another person must use, often for years.

Many organizations spend dozens or hundreds of hours maintaining their
websites after launch. Editors should not need to mentally translate
between "what I see while editing" and "what visitors actually see."

A confusing editing experience leads to:

-   inconsistent branding
-   accidental design drift
-   unnecessary training
-   slower content updates
-   reduced confidence
-   abandoned CMS features

Conversely, an editor that mirrors the published experience allows
content creators to work with confidence and consistency.

The framework therefore considers editor experience to be part of the
product---not merely a development convenience.

------------------------------------------------------------------------

## Documentation Responsibilities

Documentation should describe editor-facing decisions alongside
developer-facing decisions.

When introducing a new feature or component, documentation should answer
two questions:

> **How does this improve the experience for the visitor?**

and

> **How does this improve the experience for the person maintaining the
> website?**

If documentation only addresses developers, it is incomplete.

If a design decision intentionally changes the editor experience, that
rationale should be documented.

The goal is not simply to make websites easier to build.

The goal is to make websites easier to own.

------------------------------------------------------------------------

## Examples

### Good

-   Custom color palettes appear identically within the editor and on
    the live website.
-   Typography shown while editing closely resembles the published page.
-   Buttons inserted through Gutenberg automatically inherit framework
    spacing, border radius, and typography.
-   Reusable blocks provide meaningful names and descriptions rather
    than technical jargon.

Example:

\`\`\`text ❌ CTA_Component_01

✅ Call to Action Encourage visitors to take the next step.

------------------------------------------------------------------------

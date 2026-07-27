
# ADR-002 --- Isolate Form From Function

FKA: Separation of Presentation and Functionality

## Status

Accepted

------------------------------------------------------------------------

## Decision

The theme is responsible for presentation.

Plugins are responsible for functionality.

Any feature that should survive a theme change belongs in a plugin.

## Why

Presentation changes over time.

Business functionality often does not.

Separating these concerns allows Meybell tools to be reused across
projects and protects client investments when visual redesigns occur.

## Examples

### Theme

-   Layout
-   Typography
-   Colors
-   Templates
-   Component styling

### Plugin

-   Calculators
-   Dashboards
-   Data storage
-   Business rules
-   Forms
-   Integrations

## Tradeoffs

### Pros

-   Highly reusable
-   Easier maintenance
-   Cleaner responsibilities
-   Safer redesigns

### Cons

-   Slightly more upfront architecture
-   Requires coordination between theme and plugin

------------------------------------------------------------------------

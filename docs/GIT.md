# Git Workflow

This guide documents the Git conventions used within the Meybell Framework repository.

It is not intended to be a complete Git tutorial. Instead, it describes the practical workflow used to review, commit, and synchronize changes within this project.

---

# Philosophy

Git is more than a backup system.

It is the historical record of how the Meybell Framework evolved.

Every commit represents a meaningful milestone rather than a collection of random edits.

The objective is not simply to save work—it is to tell the story of the framework's development.

---

# Daily Workflow

## 1. Retrieve the Latest Changes

Before beginning work, synchronize with GitHub.

```bash
git pull
```

---

## 2. Review Repository Status

See what Git currently recognizes.

```bash
git status
```

This command shows:

- modified files
- new files
- deleted files
- staged files
- current branch
- synchronization status with GitHub

---

## 3. Review Your Changes

Inspect exactly what has changed.

```bash
git diff
```

This displays a line-by-line comparison between the working directory and the most recent commit.

---

## 4. Check Formatting

Verify there are no whitespace issues.

```bash
git diff --check
```

Typical issues include:

- trailing whitespace
- missing newline at end of file
- unresolved merge markers

If no output appears, no formatting issues were found.

---

## 5. Stage Changes

Stage the files intended for the next commit.

Entire repository:

```bash
git add .
```

Specific file:

```bash
git add inc/editor.php
```

Staging selects the contents of the next commit.

It does **not** create a permanent snapshot.

---

## 6. Review Staged Changes

Confirm the correct files are staged.

```bash
git status
```

This serves as a final verification before creating the commit.

---

## 7. Create the Commit

Create a permanent local snapshot.

```bash
git commit -m "Describe the completed change"
```

Example:

```bash
git commit -m "Complete framework foundation"
```

---

## 8. Synchronize with GitHub

Upload the completed commit.

```bash
git push
```

Until a commit has been pushed, it exists only on the local machine.

---

# Daily Workflow Summary

```bash
git pull

git status

git diff

git diff --check

git add .

git status

git commit -m "Describe the completed change"

git push
```

---

# Command Reference

## `git pull`

Downloads remote commits and merges them into the current branch.

Use before beginning work.

---

## `git status`

Displays the current state of the repository.

Use this command frequently.

It answers:

- What has changed?
- What is staged?
- What branch am I on?
- Am I synchronized with GitHub?

---

## `git diff`

Displays unstaged line-by-line changes.

Use before staging to review your work.

---

## `git diff --check`

Checks for formatting and whitespace issues.

This command does **not** validate:

- PHP syntax
- CSS syntax
- JavaScript syntax
- JSON syntax

It only checks formatting concerns.

---

## `git add`

Stages changes for the next commit.

Stage everything:

```bash
git add .
```

Stage a single file:

```bash
git add path/to/file
```

Think of staging as selecting what will appear in the next snapshot.

---

## `git commit`

Creates a permanent local snapshot of staged changes.

A commit should represent one meaningful unit of completed work.

---

## `git push`

Uploads local commits to GitHub.

---

## `git log --oneline`

Displays a condensed project history.

```bash
git log --oneline
```

Example:

```text
f84d2ab Document repository Git workflow
52d9c36 Complete framework foundation
81ea8ff Register navigation locations
```

---

# Commit Message Style

Commit messages should:

- begin with an imperative verb
- describe the completed result
- remain concise
- represent one meaningful change

Good examples:

```text
Complete framework foundation

Document repository Git workflow

Implement design token system

Register navigation locations

Refine typography scale

Create button component
```

Avoid:

```text
Worked on Git

Misc changes

Updates

Fixed stuff

Testing
```

---

# Commit Boundaries

A commit should represent a coherent milestone.

Examples include:

- completing one framework capability
- documenting one concept
- introducing one component
- fixing one clearly defined issue
- completing one sprint objective

Avoid combining unrelated work into a single commit whenever practical.

---

# Pre-Commit Checklist

Before committing:

```bash
git status

git diff

git diff --check

git add .

git status

git commit -m "Describe the completed change"

git push
```

The second `git status` confirms exactly what will become part of the permanent history.

---

# Mental Model

Think of Git as the museum curator for the framework.

- `git status` walks through the galleries to see what has changed.
- `git diff` compares today's exhibit with yesterday's.
- `git diff --check` straightens the picture frames before opening.
- `git add` selects which exhibits belong in the next collection.
- `git commit` publishes the exhibition catalog.
- `git push` sends the updated catalog to GitHub.

Every commit should tell part of the story of how the Meybell Framework evolved.

---

# Source of Truth

The Git repository is the authoritative source for:

- framework code
- repository architecture
- architecture decisions (ADRs)
- project-specific development standards
- contributor workflows

General educational material, research, and evolving knowledge belong within the Meybell & Co. Knowledge Base in Google Drive.

Documentation should live as close as practical to the thing it describes.

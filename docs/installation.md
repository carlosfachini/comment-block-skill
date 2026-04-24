# Installation

Comment Block is distributed as a standalone skill. The source skill lives in `skill/`.

Use the skill in tools that can load a skill folder, a reusable instruction file, or custom agent rules.

## Codex CLI / Local Codex

Copy the contents of `skill/` into a Codex skill directory named `comment-block`:

```bash
mkdir -p ~/.codex/skills/comment-block
cp -R skill/* ~/.codex/skills/comment-block/
```

Then invoke it:

```text
use comment-block
```

## Claude / Claude Code

Use `skill/SKILL.md` as reusable coding instructions in the Claude environment you are using.

For Claude Code, a practical project-level setup is to reference the skill from `CLAUDE.md`:

```md
# Project Instructions

@path/to/comment-block-skill/skill/SKILL.md

Use Comment Block when I ask for `use comment-block`, `comment-block manual`, `comment-block config`, or `comment-block: Title | Body`.
```

You can also paste the contents of `skill/SKILL.md` directly into `CLAUDE.md` if your setup does not support imports or file references. Keep the technical name `comment-block` so prompts such as `use comment-block` and `comment-block:` remain consistent.

## Cursor

Add the instructions from `skill/SKILL.md` to Cursor Project Rules or to the agent instruction system used by your workspace.

Suggested project rule path:

```text
.cursor/rules/comment-block.mdc
```

Suggested rule header:

```mdc
---
description: Insert structured Comment Block comments when requested.
alwaysApply: false
---
```

Put the contents of `skill/SKILL.md` in that rule, or reference it from the rule if your workspace layout supports file references. Use an Agent Requested or Manual rule when you do not want the instructions always loaded. Keep the technical name `comment-block` so prompts such as `use comment-block` and `comment-block:` remain consistent.

## Other AI Coding CLIs

Use `skill/SKILL.md` as the instruction source when the CLI supports custom rules, reusable prompts, or skill-like folders.

The agent needs permission to inspect and edit files in the target repository. Assisted mode should still ask for confirmation before editing.

## Generic AI Coding Agents

Use `skill/SKILL.md` as the agent instruction pack. The agent must be able to:

- inspect the active file or selected code;
- determine the correct comment syntax;
- edit source files;
- ask for confirmation when required.

## Basic Usage

Assisted mode:

```text
use comment-block
```

Manual mode:

```text
use comment-block manual
```

Quick mode:

```text
comment-block: Final Price Calculation | Centralizes subtotal, discount, and total rules.
```

Config help:

```text
comment-block config
```

## Release Archive

For release downloads, package at least:

```text
skill/
README.md
LICENSE
CHANGELOG.md
docs/
examples/
```

## References

- [Claude Code memory documentation](https://docs.anthropic.com/en/docs/claude-code/memory)
- [Cursor rules documentation](https://docs.cursor.com/context/rules)

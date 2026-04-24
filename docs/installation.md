# Installation

Comment Block is distributed as a standalone skill. The source skill lives in `skill/`.

## Codex Local Install

Copy the contents of `skill/` into a Codex skill directory named `comment-block`:

```bash
mkdir -p ~/.codex/skills/comment-block
cp -R skill/* ~/.codex/skills/comment-block/
```

Then invoke it in Codex:

```text
use comment-block
```

## Codex Cloud

Use the repository or release archive as the skill source, depending on the workspace setup. The installed skill name should be `comment-block`, and the active skill file should be `SKILL.md`.

## Cursor

Add the instructions from `skill/SKILL.md` to your reusable rules or agent instruction system. Keep the technical name `comment-block` so prompts such as `use comment-block` and `comment-block:` remain consistent.

## Generic AI Coding Agents

Use `skill/SKILL.md` as the agent instruction pack. The agent must be able to:

- inspect the active file or selected code;
- determine the correct comment syntax;
- edit source files;
- ask for confirmation when required.

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

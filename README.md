# Comment Block

Comment Block is an installable AI coding skill for adding structured, visually framed comment blocks around features, sections, and logical code areas in any codebase.

It is designed for AI coding tools, CLIs, and agents that can read a `SKILL.md` file or reusable instruction pack while editing code.

## What It Does

Comment Block helps an AI agent:

- detect the language or framework from file path and content;
- choose valid comment syntax for that context;
- insert a structured start/end comment with a `#` border and `||` side rails around the intended block;
- include type, title, date, optional author, and body;
- avoid syntax-sensitive positions such as strings, JSX props, invalid JSON locations, and template attributes;
- ask for confirmation or clarification when the insertion point is ambiguous.

The public name is **Comment Block**. The technical skill name is `comment-block`.

## Compatible AI Tools

Comment Block is intended for:

- Codex CLI / local Codex
- Claude / Claude Code
- Cursor
- AI coding CLIs that support custom instructions or reusable skills
- generic AI coding agents that can inspect and edit source files

The skill is not tied to a specific application, framework, repository, or UI component. It works by giving the agent a repeatable procedure for detecting code context and inserting valid comments.

## How It Works

Comment Block does not run as a standalone executable. It is an instruction-based skill for an AI coding agent.

When invoked, the agent should:

1. inspect the current file, selected code, diff, or user-described target;
2. identify the language and exact syntactic context;
3. choose the correct comment syntax;
4. prepare the structured comment block;
5. propose the insertion location in assisted mode;
6. edit the file only after confirmation, unless the user requested a direct quick/manual edit with an unambiguous location.

The quality of the result depends on the host AI tool having file inspection and file editing permissions.

## Usage Modes

### Assisted Mode

Default mode. Use this when you want the agent to inspect the current file, selected code, or diff and suggest the best comment block.

Ask the agent:

```text
use comment-block
```

The agent analyzes the active file, selected code, diff, or surrounding context and proposes:

- type
- title
- body
- date
- optional author, if configured or requested
- insertion location

It asks for confirmation before editing. This is the safest default because the agent can verify the title, body, type, and insertion point before changing the file.

Example proposal:

```text
Suggestion:
Type: FEATURE
Title: Final Price Calculation
Body: Centralizes subtotal, discount, and total rules displayed in the summary.
Location: before the PriceSummary component.

Apply?
```

### Manual Mode

Use this when you already know the comment content:

```text
use comment-block manual
```

The agent asks for only the missing title and body. Type defaults to `FEATURE`, date is automatic, and author remains optional.

### Quick Mode

Use this when you want to provide the title and body in one line:

```text
comment-block: Final Price Calculation | Centralizes subtotal, discount, and total rules.
```

The left side becomes the title. The right side becomes the body. The agent may still confirm the insertion location if more than one block could match.

### Config Mode

Use this to ask how the skill can be configured:

```text
comment-block config
```

The agent explains optional settings such as default author, default type, confirmation behavior, and language detection preferences. Config mode is informational unless you ask the agent to edit a local configuration file.

## Comment Types

Default type: `FEATURE`

Supported types:

- `FEATURE`
- `SECTION`
- `LOGIC`
- `TODO`
- `BUGFIX`
- `REFACTOR`
- `NOTE`

The agent should infer the type from wording when clear, otherwise use `FEATURE`.

## Comment Format

Without author:

```js
/* [START: FEATURE]
########################################################################
|| Title: FINAL PRICE CALCULATION                                     ||
|| Date: 2026-04-24                                                   ||
||                                                                    ||
|| Centralizes subtotal, discount, and total rules displayed in the   ||
|| summary.                                                           ||
########################################################################
[END: FEATURE] */
function calculateFinalPrice() {
  // ...
}
```

With author:

```tsx
{/* [START: FEATURE]
########################################################################
|| Title: FINAL PRICE CALCULATION                                     ||
|| Date: 2026-04-24                                                   ||
|| Author: Carlos                                                     ||
||                                                                    ||
|| Centralizes subtotal, discount, and total rules displayed in the   ||
|| summary.                                                           ||
########################################################################
[END: FEATURE] */}
<PriceSummary />
```

## Supported Languages And Contexts

Comment Block includes rules for:

- HTML
- Vue templates
- React JSX and TSX
- JavaScript
- TypeScript
- CSS
- PHP code and mixed PHP/HTML files
- Python
- Shell
- Ruby
- JSONC

Plain JSON does not support comments, so the skill should avoid editing `.json` files unless the target format explicitly supports comments.

See [docs/compatibility.md](docs/compatibility.md) for the compatibility matrix.

## Installation And Use

See [docs/installation.md](docs/installation.md).

Current version: `0.1.1`.

For Codex-style local skills, install the contents of the `skill/` directory as a skill named `comment-block`.

Example:

```bash
mkdir -p ~/.codex/skills/comment-block
cp -R skill/* ~/.codex/skills/comment-block/
```

For tools that do not support skill folders, use [skill/SKILL.md](skill/SKILL.md) as a reusable instruction file, project memory, or rules file.

Common mappings:

| Tool | Suggested install path |
| --- | --- |
| Codex CLI / local Codex | `~/.codex/skills/comment-block/` |
| Claude Code | `CLAUDE.md` or an imported Markdown instruction file |
| Cursor | `.cursor/rules/comment-block.mdc` or project/user rules |
| Other AI coding CLIs | The tool's custom instructions or rules location |

## Versioning And Releases

Comment Block uses semantic versioning and GitHub Releases. Releases are automated from the `VERSION` file.

- Source version: [VERSION](VERSION)
- Release history: [CHANGELOG.md](CHANGELOG.md)
- Release process: [docs/releasing.md](docs/releasing.md)

When a commit is pushed to `main`, GitHub Actions reads `VERSION`. If the matching tag does not exist yet, it creates the tag, publishes a GitHub Release, and attaches a `.zip` archive of the skill.

GitHub shows the latest version in the repository sidebar after the release is published.

## Before And After

Before:

```tsx
<PriceSummary />
```

After:

```tsx
{/* [START: FEATURE]
########################################################################
|| Title: FINAL PRICE CALCULATION                                     ||
|| Date: 2026-04-24                                                   ||
||                                                                    ||
|| Centralizes subtotal, discount, and total rules displayed in the   ||
|| summary.                                                           ||
########################################################################
[END: FEATURE] */}
<PriceSummary />
```

More examples are available in [examples/](examples/).

## Safety Rules

Comment Block prioritizes syntactically valid edits:

- do not insert comments inside string literals;
- do not insert comments inside JSX prop lists or tag attributes;
- do not insert comments in strict JSON;
- do not split a syntactic construct unless the language allows it;
- keep the `#` border and `||` side rails inside the language-appropriate comment wrapper;
- prefer inserting immediately before or after a complete node, declaration, selector, block, or section;
- ask for clarification when the target location cannot be inferred confidently.

## Relationship To Other Projects

This repository is the source of truth for the AI skill, examples, release downloads, and versioning.

It is independent from any visual/manual comment generator app. Other projects can link to this repository or its releases, but they are not required to use the skill.

## Contributing

Contributions should preserve the core behavior:

- keep the skill instructions concise and agent-friendly;
- add examples when introducing language-specific behavior;
- document compatibility changes;
- avoid adding runtime dependencies unless they materially improve safety or portability.

## License

MIT. See [LICENSE](LICENSE).

# Compatibility

Comment Block is language-aware but intentionally conservative. It should prefer a valid insertion point over forcing a comment into fragile syntax.

The skill is generic. It is not coupled to a specific app, framework, component name, route, or repository structure.

## Compatible AI Tools

| Tool type | Compatibility |
| --- | --- |
| Codex CLI / local Codex | Native skill folder usage |
| Claude / Claude Code | Use `skill/SKILL.md` as reusable coding instructions, project memory, or a referenced Markdown instruction file |
| Cursor | Use `skill/SKILL.md` as Project Rules, User Rules, or reusable agent instructions |
| Other AI coding CLIs | Use `skill/SKILL.md` as custom instructions when file editing is supported |
| Generic AI coding agents | Compatible when the agent can inspect files, edit files, and ask clarifying questions |

Compatibility means the AI tool can load the instructions and apply them while editing code. It does not require a dedicated plugin API.

For tools without native skills, compatibility means adapting `skill/SKILL.md` into the tool's persistent instruction format.

## Supported Contexts

| Context | Comment syntax |
| --- | --- |
| HTML | `<!-- -->` |
| Vue template | `<!-- -->` |
| React JSX / TSX markup | `{/* */}` |
| JavaScript / TypeScript code | `/* */` |
| CSS | `/* */` |
| PHP code | `/* */` |
| PHP mixed HTML | `<!-- -->` in HTML regions |
| Python | `#` |
| Shell | `#` |
| Ruby | `#` |
| JSONC / JSON5 | `/* */` or `//` when valid locally |
| strict JSON | not supported |

## Safety Expectations

The agent should not insert comments in:

- strings or template literal text;
- JSX prop lists;
- HTML, Vue, or JSX attributes;
- import/export specifier lists;
- object literal key positions;
- strict JSON files;
- locations that split a syntactic construct.

When uncertain, the agent should ask for a target location before editing.

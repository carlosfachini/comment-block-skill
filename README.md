# Comment Block

Comment Block is an installable AI coding skill for adding structured comment blocks around features, sections, and logical code areas.

It is designed for AI coding tools and agents that can read a `SKILL.md` file and follow procedural instructions while editing code.

## What It Does

Comment Block helps an AI agent:

- detect the language or framework from file path and content;
- choose valid comment syntax for that context;
- insert a structured start/end comment around the intended block;
- include type, title, date, optional author, and body;
- avoid syntax-sensitive positions such as strings, JSX props, invalid JSON locations, and template attributes;
- ask for confirmation or clarification when the insertion point is ambiguous.

The public name is **Comment Block**. The technical skill name is `comment-block`.

## Supported Tools

Comment Block is intended for:

- Codex
- Codex Cloud
- Cursor
- generic AI coding agents that support reusable skills or instruction packs

## Usage Modes

### Assisted Mode

Default mode. Ask the agent:

```text
use comment-block
```

The agent analyzes the active file, diff, or surrounding context and proposes:

- type
- title
- body
- date
- optional author, if configured or requested
- insertion location

It asks for confirmation before editing.

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

Use this when you already know the content:

```text
use comment-block manual
```

The agent asks for the title and body. Type defaults to `FEATURE`, date is automatic, and author remains optional.

### Quick Mode

Use a compact title/body request:

```text
comment-block: Final Price Calculation | Centralizes subtotal, discount, and total rules.
```

The left side becomes the title. The right side becomes the body. The agent may still confirm the insertion location if it is ambiguous.

### Config Mode

Ask for optional settings:

```text
comment-block config
```

The agent explains settings such as default author, default type, confirmation behavior, and language detection preferences.

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
Title: FINAL PRICE CALCULATION
Date: 2026-04-24

Centralizes subtotal, discount, and total rules displayed in the summary.
[END: FEATURE] */
function calculateFinalPrice() {
  // ...
}
```

With author:

```tsx
{/* [START: FEATURE]
Title: FINAL PRICE CALCULATION
Date: 2026-04-24
Author: Carlos

Centralizes subtotal, discount, and total rules displayed in the summary.
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

## Installation

See [docs/installation.md](docs/installation.md).

For Codex-style local skills, install the contents of the `skill/` directory as a skill named `comment-block`.

Example:

```bash
mkdir -p ~/.codex/skills/comment-block
cp -R skill/* ~/.codex/skills/comment-block/
```

## Before And After

Before:

```tsx
<PriceSummary />
```

After:

```tsx
{/* [START: FEATURE]
Title: FINAL PRICE CALCULATION
Date: 2026-04-24

Centralizes subtotal, discount, and total rules displayed in the summary.
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
- prefer inserting immediately before or after a complete node, declaration, selector, block, or section;
- ask for clarification when the target location cannot be inferred confidently.

## Relationship To The Vue App

The existing `comment-block` Vue app is a manual visual comment block generator.

This repository is separate. It is the source of truth for the AI skill, examples, release downloads, and versioning. The Vue app may later link to this repository or its releases as an “AI Skill” download.

## Contributing

Contributions should preserve the core behavior:

- keep the skill instructions concise and agent-friendly;
- add examples when introducing language-specific behavior;
- document compatibility changes;
- avoid adding runtime dependencies unless they materially improve safety or portability.

## License

MIT. See [LICENSE](LICENSE).

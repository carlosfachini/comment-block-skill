# Compatibility

Comment Block is language-aware but intentionally conservative. It should prefer a valid insertion point over forcing a comment into fragile syntax.

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

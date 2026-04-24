# Releasing

Comment Block uses semantic versioning and GitHub Releases.

The current source version is stored in `VERSION`. Release notes live in `CHANGELOG.md`.

Releases are automated by `.github/workflows/release.yml`.

## Version Numbers

Use:

- `MAJOR` for breaking changes to the skill behavior or install layout;
- `MINOR` for new supported modes, languages, tools, or significant behavior improvements;
- `PATCH` for documentation fixes, examples, typo fixes, and small clarifications.

Examples:

- `v0.1.0`: first public release;
- `v0.2.0`: new compatibility or language support;
- `v0.1.1`: documentation-only fix;
- `v1.0.0`: stable public release.

## Automatic Release Flow

For each release:

1. Update `VERSION`.
2. Add a matching entry to `CHANGELOG.md`.
3. Commit the changes.
4. Push to `main`.

The GitHub Actions workflow will:

1. read `VERSION`;
2. create a tag like `v0.2.0` if it does not already exist;
3. extract release notes from the matching `CHANGELOG.md` section;
4. publish a GitHub Release;
5. attach a release archive named `comment-block-skill-vX.Y.Z.zip`.

If the tag already exists, the workflow skips release creation.

## Manual First Release

Use this only if you want to create the tag and release manually instead of using the workflow.

After committing the files:

```bash
git tag v0.1.0
git push origin main
git push origin v0.1.0
```

Then create the GitHub Release:

1. Open the repository on GitHub.
2. Go to **Releases**.
3. Click **Draft a new release**.
4. Select the `v0.1.0` tag.
5. Use `v0.1.0` as the release title.
6. Copy the `0.1.0` notes from `CHANGELOG.md`.
7. Mark it as the latest release.
8. Publish the release.

After publishing, GitHub will show the release count and latest version in the repository sidebar.

## Future Releases

1. Update `VERSION`.
2. Add a new entry to `CHANGELOG.md`.
3. Commit the changes.
4. Push to `main`.

Example:

```bash
git add .
git commit -m "Release v0.2.0"
git push origin main
```

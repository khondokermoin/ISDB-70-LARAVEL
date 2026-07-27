from pathlib import Path
import re

root = Path('resources/js/Customer')
components_dir = root / 'Components'
paths = sorted(components_dir.glob('*.jsx'))
for path in paths:
    text = path.read_text(encoding='utf-8')
    original = text
    text = text.replace('import { Link, NavLink } from "react-router-dom";', "import { Link } from '@inertiajs/react';")
    text = text.replace("import { Link, NavLink } from 'react-router-dom';", "import { Link } from '@inertiajs/react';")
    text = text.replace('import { NavLink, Link } from "react-router-dom";', "import { Link } from '@inertiajs/react';")
    text = text.replace("import { NavLink, Link } from 'react-router-dom';", "import { Link } from '@inertiajs/react';")
    text = text.replace('import { Link } from "react-router-dom";', "import { Link } from '@inertiajs/react';")
    text = text.replace("import { Link } from 'react-router-dom';", "import { Link } from '@inertiajs/react';")
    text = text.replace('<NavLink', '<Link')
    text = text.replace('</NavLink>', '</Link>')
    text = text.replace(' to=', ' href=')
    text = re.sub(r'className=\{\(navData\) =>\s*navData\.isActive\s*\?\s*["\']([^"\']*)["\']\s*:\s*["\']([^"\']*)["\']\s*\}', r'className="\2"', text)
    if text != original:
        path.write_text(text, encoding='utf-8')
        print('patched', path.name)
print('done')

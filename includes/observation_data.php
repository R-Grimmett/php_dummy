<?php

function randomObservation(): array {
    $observations = [
        [
            "title" => "The Efficiency Illusion",
            "text" => "People often equate busyness with productivity, though the two frequently diverge. The appearance of motion becomes a substitute for meaningful progress."
        ],
        [
            "title" => "Fear of the Unlabeled",
            "text" => "Ambiguity triggers discomfort because humans crave classification. We’d rather mislabel than leave something undefined."
        ],
        [
            "title" => "Social Mirrors",
            "text" => "Individuals subtly reshape themselves based on the perceived expectations of those around them. Authenticity is often negotiated rather than expressed."
        ],
        [
            "title" => "The Reciprocity Trap",
            "text" => "Many acts of kindness come with unspoken contracts. Reciprocity isn’t always about goodwill—it can be a tool for social leverage."
        ],
        [
            "title" => "The Fragility of Certainty",
            "text" => "Strong opinions are sometimes a defense against internal doubt. The louder the assertion, the shakier the foundation may be."
        ],
        [
            "title" => "Status Through Subtlety",
            "text" => "In high-context environments, status is signaled not through overt displays, but through what is left unsaid or understated. Power often hides in understatement."
        ],
        [
            "title" => "Group Morality Drift",
            "text" => "What a group deems acceptable can shift dramatically without individuals realizing it. Collective norms often evolve faster than personal conscience."
        ],
        [
            "title" => "Empathy Fatigue",
            "text" => "The more exposed we are to others’ pain, the more selective our compassion becomes. Emotional bandwidth is finite and often unconsciously rationed."
        ],
        [
            "title" => "The Echo of First Impressions",
            "text" => "Initial judgments are sticky. Even when proven wrong, people subconsciously adjust new information to fit their first impression."
        ],
        [
            "title" => "Conflict Avoidance as Control",
            "text" => "Avoiding confrontation can be a form of manipulation. It maintains surface harmony while suppressing dissent and complexity."
        ]
    ];

    return $observations[array_rand($observations)];
}
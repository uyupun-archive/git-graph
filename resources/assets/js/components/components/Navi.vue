<template>
    <div class="nav">
        <div class="navContainer">
            <h1 class="title">
                <i class="fab fa-github"></i>
                <span>GitGraph</span>
            </h1>
            <a href="https://github.com/tyokinuhata/git-graph" target="_blank" class="link">GitHub</a>
            <a href="https://twitter.com/h_tyokinuhata" target="_blank" class="link">Twitter</a>
        </div>
    </div>
</template>

<style lang="scss" scoped>
    .nav {
        background: #24292e;
        width: 100%;
        height: 55px;
    }

    .navContainer {
        max-width: 980px;
        width: 100%;
        margin: 0 auto;
    }

    .title {
        display: inline-block;
        margin-right: 30px;
        line-height: 55px;
        font-size: 33px;
        color: #fff;
    }

    .link {
        margin-right: 20px;
        text-decoration: none;
        font-weight: 600;
        color: rgba(255,255,255,0.75);
    }
</style>